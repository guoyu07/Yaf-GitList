<?php

/**
 * 用户登录控制器
 *
 * @author $Author: 5590548@qq.com $
 *
 */
class LoginController extends Local\Controller\Base
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

		// 用户已经登录
		if (Yaf\Registry::get('userInfo'))
		{
			$this->redirect('/index');
		}
	}

	/**
	 * 用户登录
	 *
	 */
	public function indexAction()
	{
		$title = '用户登录';
		$this->getView()->assign('title', $title);
	}

	/**
	 * 执行用户登录
	 *
	 * @return boolean
	 */
	public function accountAction()
	{
		$email = $this->getRequest()->getPost('email');
		$password = $this->getRequest()->getPost('password');

		if (empty($email))
		{
			Local\Util\Page::displayError('请填写邮箱');
		}

		if (empty($password))
		{
			Local\Util\Page::displayError('请输入密码');
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			Local\Util\Page::displayError('邮箱格式不正确');
		}

		$userInfo = $this->models['userModel']->getUserByEmail($email);

		if (empty($userInfo))
		{
			Local\Util\Page::displayError('用户不存在');
		}

		// 检查密码
		if ($userInfo['password'] == md5(md5($password) . $userInfo['salt']))
		{
			// 写入 Cookies
			Local\Header\Cookies::setCookie('email', $userInfo['email']);
			Local\Header\Cookies::setCookie('password', $userInfo['password']);

			// 更新最后登录时间
			$this->models['userModel']->updateLastLoginTime($userInfo['userid']);

			$this->redirect('/index');
		}
		else
		{
			Local\Util\Page::displayError('密码不正确');
		}

		return FALSE;
	}

}