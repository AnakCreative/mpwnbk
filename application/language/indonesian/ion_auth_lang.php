<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Ion Auth Lang - Indonesian
*
* Author: Toni Haryanto
* 		  toha.samba@gmail.com
*         @yllumi
*
* Author: Daeng Muhammad Feisal
*         daengdoang@gmail.com
*         @daengdoang
*
* Author: Suhindra
*         suhindra@hotmail.co.id
*         @suhindra
*
* Location: https://github.com/benedmunds/CodeIgniter-Ion-Auth
*
* Created:  11.15.2011
* Last-Edit: 28.04.2016
*
* Description:  Indonesian language file for Ion Auth messages and errors
*
*/

// Account Creation
$lang['account_creation_successful']				= 'akun berhasil dibuat';
$lang['account_creation_unsuccessful']				= 'tidak dapat membuat akun';
$lang['account_creation_duplicate_email']			= 'email sudah digunakan atau tidak valid';
$lang['account_creation_duplicate_identity']	    = 'identitas sudah digunakan atau tidak valid';

// TODO Please Translate
$lang['account_creation_missing_default_group']		= 'standar grup tidak diatur';
$lang['account_creation_invalid_default_group']		= 'pengaturan nama grup standar tidak valid';


// Password
$lang['password_change_successful']					= 'kata sandi berhasil diubah';
$lang['password_change_unsuccessful']				= 'tidak dapat mengganti kata sandi';
$lang['forgot_password_successful']					= 'email untuk set ulang kata sandi telah dikirim';
$lang['forgot_password_unsuccessful']				= 'tidak dapat set ulang kata sandi';

// Activation
$lang['activate_successful']						= 'akun telah diaktifkan';
$lang['activate_unsuccessful']						= 'tidak dapat mengaktifkan akun';
$lang['deactivate_successful']						= 'akun telah dinonaktifkan';
$lang['deactivate_unsuccessful']					= 'tidak dapat menonaktifkan akun';
$lang['activation_email_successful']			    = 'email untuk aktivasi telah dikirim. silahkan cek inbox atau spam';
$lang['activation_email_unsuccessful']		        = 'tidak dapat mengirimkan email aktivasi';
$lang['deactivate_current_user_unsuccessful']		= 'anda tidak dapat nonaktifkan akun anda sendiri.';

// Login / Logout
$lang['login_successful']							= 'log in berhasil';
$lang['login_unsuccessful']							= 'log in gagal';
$lang['login_unsuccessful_not_active']	            = 'akun tidak aktif';
$lang['login_timeout']								= 'sementara terkunci. coba beberapa saat lagi.';
$lang['logout_successful']							= 'log out berhasil';

// Account Changes
$lang['update_successful']							= 'informasi akun berhasil diperbaharui';
$lang['update_unsuccessful']						= 'gagal memperbaharui informasi akun';
$lang['delete_successful']							= 'pengguna telah dihapus';
$lang['delete_unsuccessful']						= 'gagal menghapus pengguna';

// Groups
$lang['group_creation_successful']				    = 'grup berhasil dibuat';
$lang['group_already_exists']						= 'nama grup sudah digunakan';
$lang['group_update_successful']					= 'rincian grup berhasil diubah';
$lang['group_delete_successful']					= 'grup berhasil dihapus';
$lang['group_delete_unsuccessful']				    = 'gagal menghapus grup';
$lang['group_delete_notallowed']					= 'tidak dapat menghapus grup administrator';
$lang['group_name_required']						= 'nama grup tidak boleh kosong';
$lang['group_name_admin_not_alter']			    	= 'nama grup admin tidak bisa diubah';

// Activation Email
$lang['email_activation_subject']					= 'Aktivasi Akun';
$lang['email_activate_heading']						= 'Aktifkan Akun dari %s';
$lang['email_activate_subheading']				    = 'Silahkan klik tautan berikut untuk %s.';
$lang['email_activate_link']						= 'Aktifkan Akun Anda';

// Forgot Password Email
$lang['email_forgotten_password_subject']			= 'Verifikasi Lupa Password';
$lang['email_forgot_password_heading']				= 'Setel Ulang Kata Sandi untuk %s';
$lang['email_forgot_password_subheading']			= 'Silahkan klik tautan berikut untuk %s.';
$lang['email_forgot_password_link']					= 'Setel Ulang Kata Sandi';

// New Password Email
$lang['email_new_password_subject']					= 'Kata Sandi Baru';
$lang['email_new_password_heading']					= 'Kata Sandi Baru Untuk %s';
$lang['email_new_password_subheading']			    = 'Kata Sandi Telah Diubah Ke: %s';
