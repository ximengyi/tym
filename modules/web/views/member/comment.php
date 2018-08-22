<?php
use \app\common\services\UrlService;
use \app\common\services\UtilService;
use \app\common\services\StaticService;
use \app\common\services\ConstantMapService;
StaticService::includeAppJsStatic( "/js/web/member/index.js",\app\assets\WebAsset::className() );
?>
<div class="row  border-bottom">
	<div class="col-lg-12">
		<div class="tab_title">
			<ul class="nav nav-pills">
								<li  >
					<a href="/web/member/index">会员列表</a>
				</li>
								<li  class="current"  >
					<a href="/web/member/comment">会员评论</a>
				</li>
							</ul>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered m-t">
            <thead>
            <tr>
                <th>头像</th>
                <th>姓名</th>
                <th>手机</th>
                <th>书籍名称</th>
                <th>评论内容</th>
                <th>打分</th>
            </tr>
            </thead>
            <tbody>
            <?php if( $list ):?>
                <?php foreach( $list as $_item ):?>
                    <tr>
                        <td>
                            <?php if( $_item['member_info'] ):?>
                                <img alt="image" class="img-circle" src="<?= UrlService::buildPicUrl("avatar",$_item['member_info']['avatar']) ;?>" style="width: 40px;height: 40px;">
                            <?php endif;?>
                        </td>
                        <td>
                            <?php if( $_item['member_info'] ):?>
                                <?= UtilService::encode( $_item['member_info']['nickname'] );?>
                            <?php endif;?>
                        </td>
                        <td>
                            <?php if( $_item['member_info'] ):?>
                                <?= UtilService::encode( $_item['member_info']['mobile'] );?>
                            <?php endif;?>
                        </td>
                        <td><?= $_item['book_name'] ;?></td>
                        <td><?= $_item['content'] ;?></td>
                        <td><?= $_item['score'] ;?></td>
                    </tr>
                <?php endforeach;?>
            <?php else:?>
                <tr><td colspan="5">暂无数据</td></tr>
            <?php endif;?>
							            </tbody>
        </table>
        <?php echo \Yii::$app->view->renderFile("@app/modules/web/views/common/pagination.php", [
            'pages' => $pages,
            'url' => '/member/comment'
        ]); ?>

    </div>
</div>

	</div>
</div>
