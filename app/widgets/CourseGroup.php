<?php

namespace app\widgets;

use yii\base\Widget;

class CourseGroup extends Widget
{
    /**
     * @var \yii\base\Model the model that keeps the user-entered filter data. When this property is set,
     * the grid view will enable column-based filtering. Each data column by default will display a text field
     * at the top that users can fill in to filter the data.
     *
     * Note that in order to show an input field for filtering, a column must have its [[DataColumn::attribute]]
     * property set and the attribute should be active in the current scenario of $filterModel or have
     * [[DataColumn::filter]] set as the HTML code for the input field.
     *
     * When this property is not set (null) the filtering feature is disabled.
     */
    public $filterModel;
    public $columns;
    /**
     * @var \app\models\CourseGroup[].
     */
    public $courseGroups;


    public function run()
    {
        return $this->render('CourseGroup', [
            'courseGroups' => $this->courseGroups->models
        ]);
    }
}