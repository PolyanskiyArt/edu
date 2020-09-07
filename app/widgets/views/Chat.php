<?php $assets = \app\assets\AssetBundle::register($this);

use app\widgets\Chat; ?>

<?php //dump($messages); die(); ?>

<!-- Wide card with share menu button -->
<style>
    .content-grid {
        max-width: 1024px;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: row;
        height: 72px;
        pointer-events: all;
    }

    .card > .avatar {
        display: flex;
        flex: none;
        align-items: center;
    }

    .picture {
        height: 49px;
        width: 49px;
        background-color: antiquewhite;
        border-radius: 50%;
    }

    .card-body {
        padding-right: 15px;
        border-top: 1px solid var(--border-list);
        display: flex;
        flex-basis: auto;
        flex-direction: column;
        flex-grow: 1;
        justify-content: center;
        min-width: 0;
    }

    .mess_row_1 {
        display: flex;
        flex-grow: 1;
        overflow: hidden;
        color: black;
        font-weight: 400;
        font-size: 17px;
        line-height: 21px;
    }

    .mess_count {
        margin-top: 3px;
        margin-left: 6px;
        line-height: 14px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        flex: none;
        max-width: 100%;
        font-size: 12px;
        /*line-height: 20px;*/
        text-align: right;
    }

    .mess_list {
        margin-left: 6px;
    }
</style>
<div class="content-grid mdl-grid">
        <div class="row">
            <div class="col1" style="overflow: auto">
                <? foreach ($messages as $message) { ?>
                    <div class="card">
                        <div class="avatar">
                            <div class="picture" style="height: 49px; width: 49px;">
<!--                                <img src="#" alt="" draggable="false" class="" style="visibility: visible;">-->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 212 212" width="212" height="212">
                                    <path fill="#DFE5E7" class="background" transform="scale(.23)"
                                          d="M106.251.5C164.653.5 212 47.846 212 106.25S164.653 212 106.25 212C47.846 212 .5 164.654.5 106.25S47.846.5 106.251.5z"></path>
                                    <path fill="#FFF" class="primary" transform="scale(.23)"
                                          d="M173.561 171.615a62.767 62.767 0 0 0-2.065-2.955 67.7 67.7 0 0 0-2.608-3.299 70.112 70.112 0 0 0-3.184-3.527 71.097 71.097 0 0 0-5.924-5.47 72.458 72.458 0 0 0-10.204-7.026 75.2 75.2 0 0 0-5.98-3.055c-.062-.028-.118-.059-.18-.087-9.792-4.44-22.106-7.529-37.416-7.529s-27.624 3.089-37.416 7.529c-.338.153-.653.318-.985.474a75.37 75.37 0 0 0-6.229 3.298 72.589 72.589 0 0 0-9.15 6.395 71.243 71.243 0 0 0-5.924 5.47 70.064 70.064 0 0 0-3.184 3.527 67.142 67.142 0 0 0-2.609 3.299 63.292 63.292 0 0 0-2.065 2.955 56.33 56.33 0 0 0-1.447 2.324c-.033.056-.073.119-.104.174a47.92 47.92 0 0 0-1.07 1.926c-.559 1.068-.818 1.678-.818 1.678v.398c18.285 17.927 43.322 28.985 70.945 28.985 27.678 0 52.761-11.103 71.055-29.095v-.289s-.619-1.45-1.992-3.778a58.346 58.346 0 0 0-1.446-2.322zM106.002 125.5c2.645 0 5.212-.253 7.68-.737a38.272 38.272 0 0 0 3.624-.896 37.124 37.124 0 0 0 5.12-1.958 36.307 36.307 0 0 0 6.15-3.67 35.923 35.923 0 0 0 9.489-10.48 36.558 36.558 0 0 0 2.422-4.84 37.051 37.051 0 0 0 1.716-5.25c.299-1.208.542-2.443.725-3.701.275-1.887.417-3.827.417-5.811s-.142-3.925-.417-5.811a38.734 38.734 0 0 0-1.215-5.494 36.68 36.68 0 0 0-3.648-8.298 35.923 35.923 0 0 0-9.489-10.48 36.347 36.347 0 0 0-6.15-3.67 37.124 37.124 0 0 0-5.12-1.958 37.67 37.67 0 0 0-3.624-.896 39.875 39.875 0 0 0-7.68-.737c-21.162 0-37.345 16.183-37.345 37.345 0 21.159 16.183 37.342 37.345 37.342z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="_3dtfX">
                                <div class="mess_row_1">
                                    <div dir="auto" title="Даша Полянская" class=""><?= $message['username'] ?></div>
                                    <?php if ($message['mess_count'] > 0) { ?>
                                        <div class="badge badge-pill badge-success mess_count"> <?= $message['mess_count'] ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="_1582E">
                                <div class="_3tBW6">
                        <span class="_2iq-U">
                            <span dir="ltr" class="_3ko75 _5h6Y_ _3Whw5"><?= $message['text'] ?></span>
                        </span>
                                </div>
                                <div class="m61XR"><span></span><span></span><span></span></div>
                            </div>
                        </div>
                    </div>
                <? } // end foreach ?>
            </div>
            <div class="col11">
                <div class="mess_list">
                    <h3>Выберите собеседника слева</h3>
                </div>
            </div>
        </div>

</div>
