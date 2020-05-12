<?php

?>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios@0.12.0/dist/axios.min.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/lodash@4.13.1/lodash.min.js"></script>-->
<script>

    window.onload = function () {
        var messages = new Vue({
            el: '#messages',
            data: {
                MessagesCount: 0,
                Messages: [],
                error: '',
                polling: null,
            },
            methods: {
                getData(){
                    axios
                        .get("<?= Yii::$app->urlManager->createUrl('api/get');?>")
                        .then(response => (this.MessagesCount = response.data.cnt, this.Messages = response.data.list))
                        .catch(function (e) {
                            this.error = e;
                            console.log(e);
                    });
                },
                updateData() {
                    this.polling = setInterval( () => {
                            this.getData();
                }, <?= \app\api\Messages::DELAY_UPDATE ?>);
                },
                go(id){
                    window.location = "<?= Yii::$app->urlManager->createUrl('admin/personal-messages/list?id=');?>"+id;
                }
            },
            beforeDestroy () {
                clearInterval(this.polling)
            },
            mounted: function () {
                this.getData();
                this.updateData();
            }
        });
        var notifications = new Vue({
            el: '#notifications',
            data: {
                NotificationsCount: 15
            }
        })
    }
</script>
<header class="main-header">
    <nav class="navbar navbar-expand navbar-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li id='messages' class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">{{ MessagesCount }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <template v-for="message in Messages">
                        <a href="#" v-on:click="go(message['user_id'])" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="<?= $adminlteAssets ?>/img/user1-128x128.jpg" alt="User Avatar"
                                     class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        {{ message['username'] }}
                                        <span class="float-right text-sm">
                                            <i class="fas fa-star" :class="message['star_color']"></i>
<!--                                            {{ message['important_state'] }}-->
                                        </span>
                                    </h3>
                                    <p class="text-sm">{{ message['text'] }}</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ message['created_at'] }}</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>

                        <li class="divider" role="presentation"></li>

                    </template>

                    <a href="
                    <?= Yii::$app->urlManager->createUrl('admin/personal-messages/index'); ?>
                    " class="dropdown-item dropdown-footer"
                    >См. все сообщения</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span id='notifications' class="badge badge-warning navbar-badge">{{ NotificationsCount }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
        </ul>
    </nav>
</header>
