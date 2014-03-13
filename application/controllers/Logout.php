<?php

/**
 * 用户注销控制器
 *
 * @author $Author: 5590548@qq.com $
 *
 */
class LogoutController extends Local\Controller\Base
{

	/**
	 * 初始化方法
	 *
	 */
	public function init()
	{
		// 用户信息
		$this->userInfo = \Yaf\Registry::get('userInfo');

		// 用户已经登录
		if ($this->userInfo)
		{
			$this->redirect('/index');
		}
	}

	/**
	 * 用户注销
	 *
	 */
	public function indexAction()
	{
		// 清除 Cookies
		Local\Header\Cookies::clearCookie('email');
		Local\Header\Cookies::clearCookie('password');
		// 删除全局数据
		Yaf\Registry::del('userInfo');

		$this->redirect('/index');

		return FALSE;
	}

}