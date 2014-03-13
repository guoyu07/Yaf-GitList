<?php

/**
 * 搜索控制器
 *
 * @author $Author: 5590548@qq.com $
 *
 */
class SearchController extends Local\Controller\Base
{

	/**
	 * 初始化方法
	 *
	 */
	public function init()
	{
		// 加载模型
		$this->models = array(
			'userModel' => new UserModel(),
		);

		// 用户信息
		$this->userInfo = \Yaf\Registry::get('userInfo');
		$this->getView()->assign('userInfo', $this->userInfo);
	}

	/**
	 * 搜索
	 *
	 */
	public function indexAction()
	{
		$title = '搜索';
		$this->getView()->assign('title', $title);
	}

}