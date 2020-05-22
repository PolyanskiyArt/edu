<?php

namespace app\models;

use app\helpers\FileHelper;
use app\traits\models\WithStatus;
use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * @property-read string fullName
 * @property-read string shortName
 * @property string avatar
 * @property string city
 * @property string description
 */
class User extends ActiveRecord implements IdentityInterface
{
	use WithStatus;
	
	const STATUS_ACTIVE = 10;
	const STATUS_BLOCKED = 0;

	/**
	 * @var UploadedFile
	 */
	public $file;

	public $description;
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%user}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['file', 'image',
				'extensions' => ['jpg', 'jpeg', 'png', 'gif'],
				'checkExtensionByMimeType' => true,
				'maxSize' => 1512000, // 500 килобайт = 500 * 1024 байта = 512 000 байт
				'tooBig' => 'Limit is 1500KB'
			],
			['status', 'default', 'value' => self::STATUS_ACTIVE],
			['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_BLOCKED]],
			[['first_name', 'last_name', 'email', 'username', 'avatar', 'city'], 'string'],
			[['email', 'username'], 'unique'],
			[['email', 'username'], 'required'],
			['email', 'email'],
			[['description'], 'exist', 'skipOnError' => true, 'targetClass' => TeacherProfile::className(), 'targetAttribute' => ['id' => 'user_id']],
		];
	}

	public function convertBase64ToImage($photo = null, $path = null) {
		if (!empty($photo)) {
			$photo = str_replace('data:image/png;base64,', '', $photo);
			$photo = str_replace(' ', '+', $photo);
			$photo = str_replace('data:image/jpeg;base64,', '', $photo);
			$photo = str_replace('data:image/gif;base64,', '', $photo);
			$entry = base64_decode($photo);
			$image = imagecreatefromstring($entry);

//			$fileName = time() . ".jpeg";
//			$directory = "uploads/customer/" . $fileName;
			$directory = $path;
			header('Content-type:image/jpeg');

			if (!empty($path)) {
				if (file_exists($path)) {
					unlink($path);
				}
			}

			$saveImage = imagejpeg($image, $directory);

			imagedestroy($image);

			if ($saveImage) {
				return true;
			} else {
				return false; // image not saved
			}
		}
	}

	/**
	 * Загружает файл с именем $userId.расширение в каталог avatars/
	 * @param $userId        - ID user
	 * @return bool          - true, если загружен успешно
	 */
	public function upload(string $filename)
	{
		if ($this->validate()) {
			$dir =  Yii::getAlias('@avatars'); // Директория - должна быть создана
			$file = $dir . '/' . $filename;
//			$this->file->saveAs($filename,); // Сохраняем файл
			$this->convertBase64ToImage($this->file,$file);
			// Обрежет по ширине на 600px, по высоте пропорционально
			FileHelper::resizeImage($file);

			return true;
		} else {
			return false;
		}
	}

	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'description' => 'Description',
		];
	}


	public static function primaryKey()
	{
		return ['id'];
	}

	/**
	 * User full name
	 * (as first/last name)
	 *
	 * @return string
	 */
	public function getFullName()
	{
		return "{$this->first_name} {$this->last_name}";
	}

	/**
	 * User short name
	 * (as first name, last name first letter)
	 *
	 * @return string
	 */
	public function getShortName()
	{
		return trim($this->first_name . ' ' . ($this->last_name ? $this->last_name{0} . '.' : ''));
	}
	
	/**
	 * List of user status aliases
	 *
	 * @return array
	 */
	public static function getStatusesList()
	{
		return [
			static::STATUS_ACTIVE  => 'Active',
			static::STATUS_BLOCKED => 'Blocked',
		];
	}
	
	/**
	 * @return array
	 */
	public static function getRolesList()
	{
		$roles = array_keys(Yii::$app->authManager->getRoles());
		
		return array_combine($roles, $roles);
	}
	
	/**
	 * Assign a role to user
	 *
	 * @param string $role
	 *
	 * @return bool
	 */
	public function assignRole($role)
	{
		if (!Yii::$app->authManager->checkAccess($this->id, $role)) {
			$authRole = Yii::$app->authManager->getRole($role);
			Yii::$app->authManager->assign($authRole, $this->id);
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id)
	{
		return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
	}
	
	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
	}
	
	/**
	 * Finds user by username
	 *
	 * @param string $username
	 *
	 * @return static|null
	 */
	public static function findByUsername($username)
	{
		return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
	}
	
	/**
	 * Finds user by password reset token
	 *
	 * @param string $token password reset token
	 *
	 * @return static|null
	 */
	public static function findByPasswordResetToken($token)
	{
		if (!static::isPasswordResetTokenValid($token)) {
			return null;
		}
		
		return static::findOne([
			'password_reset_token' => $token,
			'status'               => self::STATUS_ACTIVE,
		]);
	}
	
	/**
	 * Finds out if password reset token is valid
	 *
	 * @param string $token password reset token
	 *
	 * @return bool
	 */
	public static function isPasswordResetTokenValid($token)
	{
		if (empty($token)) {
			return false;
		}
		
		$timestamp = (int)substr($token, strrpos($token, '_') + 1);
		$expire = settings()->app->passwordResetToken;
		
		return $timestamp + $expire >= time();
	}
	
	/**
	 * @inheritdoc
	 */
	public function getId()
	{
		return $this->getPrimaryKey();
	}
	
	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
		return $this->auth_key;
	}
	
	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}
	
	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 *
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword($password)
	{
		return Yii::$app->security->validatePassword($password, $this->password_hash);
	}
	
	/**
	 * Generates password hash from password and sets it to the model
	 *
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password_hash = Yii::$app->security->generatePasswordHash($password);
	}
	
	/**
	 * Generates "remember me" authentication key
	 */
	public function generateAuthKey()
	{
		$this->auth_key = Yii::$app->security->generateRandomString();
	}
	
	/**
	 * Generates new password reset token
	 */
	public function generatePasswordResetToken()
	{
		$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
	}
	
	/**
	 * Removes password reset token
	 */
	public function removePasswordResetToken()
	{
		$this->password_reset_token = null;
	}

	public function getTeacherProfile(){
		return $this->hasOne(TeacherProfile::className(), ['user_id' => 'id']);
	}


}
