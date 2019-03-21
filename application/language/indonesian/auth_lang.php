<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:  Auth Lang - Indonesia
*
* Author: 	Daeng Muhammad Feisal
*     http://daengdoang.wordpress.com
*			daengdoang@gmail.com
*			@daengdoang
*
*
*
* Location: http://github.com/benedmunds/ion_auth/
*
* Created:  21.06.2013
* Last-Edit: 21.06.2017
*
* Description:  Indonesia language file for Ion Auth example views
*
*/

// Errors
$lang['error_csrf'] = 'form yang dikirim tidak lulus pemeriksaan keamanan kami.';

// Login
$lang['login_heading']         = 'login';
$lang['login_subheading']      = 'silakan login dengan email/username dan password anda.';
$lang['login_identity_label']  = 'email/username:';
$lang['login_password_label']  = 'kata Sandi:';
$lang['login_remember_label']  = 'ingatkan Saya:';
$lang['login_submit_btn']      = 'login';
$lang['login_forgot_password'] = 'lupa kata sandi?';

// Index
$lang['index_heading']           = 'pengguna';
$lang['index_subheading']        = 'di bawah ini list dari para Pengguna.';
$lang['index_fname_th']          = 'nama Awal';
$lang['index_lname_th']          = 'nama Akhir';
$lang['index_email_th']          = 'email';
$lang['index_groups_th']         = 'grup';
$lang['index_status_th']         = 'status';
$lang['index_action_th']         = 'aksi';
$lang['index_active_link']       = 'aktif';
$lang['index_inactive_link']     = 'tidak aktif';
$lang['index_create_user_link']  = 'buat pengguna baru';
$lang['index_create_group_link'] = 'buat grup baru';

// Deactivate User
$lang['deactivate_heading']                  = 'deaktivasi pengguna';
$lang['deactivate_subheading']               = 'anda yakin akan melakukan deaktivasi akun pengguna \'%s\'';
$lang['deactivate_confirm_y_label']          = 'ya:';
$lang['deactivate_confirm_n_label']          = 'tidak:';
$lang['deactivate_submit_btn']               = 'kirim';
$lang['deactivate_validation_confirm_label'] = 'konfirmasi';
$lang['deactivate_validation_user_id_label'] = 'id pengguna';

// Create User
$lang['create_user_heading']                           = 'buat pengguna';
$lang['create_user_subheading']                        = 'silakan masukan informasi Pengguna di bawah ini.';
$lang['create_user_fname_label']                       = 'nama Awal:';
$lang['create_user_lname_label']                       = 'nama Akhir:';
$lang['create_user_company_label']                     = 'nama Perusahaan:';
$lang['create_user_identity_label']                    = 'identitas:';
$lang['create_user_email_label']                       = 'surel:';
$lang['create_user_phone_label']                       = 'telepon:';
$lang['create_user_password_label']                    = 'kata sandi: (special characters,number characters,upper case character)';
$lang['create_user_password_confirm_label']            = 'konfirmasi kata sandi:';
$lang['create_user_submit_btn']                        = 'buat pengguna';
$lang['create_user_validation_fname_label']            = 'nama awal';
$lang['create_user_validation_lname_label']            = 'nama akhir';
$lang['create_user_validation_identity_label']         = 'identitas';
$lang['create_user_validation_email_label']            = 'alamat surel';
$lang['create_user_validation_phone_label']            = 'telepon';
$lang['create_user_validation_company_label']          = 'nama perusahaan';
$lang['create_user_validation_password_label']         = 'kata sandi : (special characters,number characters,upper case character)';
$lang['create_user_validation_password_confirm_label'] = 'konfirmasi kata sandi';

// Edit User
$lang['edit_user_heading']                           = 'ubah pengguna';
$lang['edit_user_subheading']                        = 'silakan masukan informasi pengguna di bawah ini.';
$lang['edit_user_fname_label']                       = 'nama awal:';
$lang['edit_user_lname_label']                       = 'nama akhir:';
$lang['edit_user_ldescription_label']                = 'deskripsi:';
$lang['edit_user_company_label']                     = 'nama perusahaan:';
$lang['edit_user_email_label']                       = 'surel:';
$lang['edit_user_phone_label']                       = 'telepon:';
$lang['edit_user_password_label']                    = 'kata sandi: (jika ingin merubah password)&(boleh menggunakan special karakter, numeric, huruf besar)';
$lang['edit_user_password_confirm_label']            = 'konfirmasi kata sandi: (jika mengubah sandi)';
$lang['edit_user_groups_heading']                    = 'anggota dari Grup';
$lang['edit_user_submit_btn']                        = 'simpan pengguna';
$lang['edit_user_validation_fname_label']            = 'nama awal';
$lang['edit_user_validation_lname_label']            = 'nama akhir';
$lang['edit_user_validation_email_label']            = 'alamat surel';
$lang['edit_user_validation_phone_label']            = 'telepon';
$lang['edit_user_validation_company_label']          = 'nama perusahaan';
$lang['edit_user_validation_groups_label']           = 'nama grup';
$lang['edit_user_validation_description_label'] = 'deskripsi';
$lang['edit_user_validation_password_label']         = 'kata sandi : (jika ingin merubah password)&(boleh menggunakan special karakter, numeric, huruf besar)';
$lang['edit_user_validation_password_confirm_label'] = 'konfirmasi kata sandi : (jika ingin merubah password)&(boleh menggunakan special karakter, numeric, huruf besar)';

// Create Group
$lang['create_group_title']                  = 'buat grup';
$lang['create_group_heading']                = 'buat grupp';
$lang['create_group_subheading']             = 'silakan masukan detail grup di bawah ini.';
$lang['create_group_name_label']             = 'nama grup:';
$lang['create_group_desc_label']             = 'deskripsi:';
$lang['create_group_submit_btn']             = 'buat grup';
$lang['create_group_validation_name_label']  = 'nama grup';
$lang['create_group_validation_desc_label']  = 'deskripsi';

// Edit Group
$lang['edit_group_title']                    = 'ubah grup';
$lang['edit_group_saved']                    = 'grup tersimpan';
$lang['edit_group_heading']                  = 'ubah grup';
$lang['edit_group_subheading']               = 'silakan masukan detail grup di bawah ini.';
$lang['edit_group_name_label']               = 'nama grup:';
$lang['edit_group_desc_label']               = 'deskripsi:';
$lang['edit_group_submit_btn']               = 'simpan grup';
$lang['edit_group_validation_name_label']    = 'nama grup';
$lang['edit_group_validation_desc_label']    = 'deskripsi';

// Change Password
$lang['change_password_heading']                               = 'ganti kata sandi';
$lang['change_password_old_password_label']                    = 'kata sandi lama:';
$lang['change_password_new_password_label']                    = 'kata sandi baru (paling sedikit %s karakter):';
$lang['change_password_new_password_confirm_label']            = 'konfirmasi kata sandi:';
$lang['change_password_submit_btn']                            = 'ubah';
$lang['change_password_validation_old_password_label']         = 'kata sandi lama';
$lang['change_password_validation_new_password_label']         = 'kata sandi baru';
$lang['change_password_validation_new_password_confirm_label'] = 'konfirmasi kata sandi baru';

// Forgot Password
$lang['forgot_password_heading']                 = 'lupa kata sandi';
$lang['forgot_password_subheading']              = 'silahkan masukkan %s anda, agar kami dapat mengirim surel untuk mereset kata sandi anda.';
$lang['forgot_password_email_label']             = '%s:';
$lang['forgot_password_submit_btn']              = 'kirim';
$lang['forgot_password_validation_email_label']  = 'alamat surel';
$lang['forgot_password_username_identity_label'] = 'nama pengguna';
$lang['forgot_password_email_identity_label']    = 'surel';
$lang['forgot_password_email_not_found']         = 'tidak ada data dari surel tersebut.';
$lang['forgot_password_identity_not_found']      = 'tidak ada data dari nama pengguna tersebut.';

// Reset Password
$lang['reset_password_heading']                               = 'ganti kata sandi';
$lang['reset_password_new_password_label']                    = 'kata sandi baru (paling sedikit %s karakter):';
$lang['reset_password_new_password_confirm_label']            = 'konfirmasi kata sandi:';
$lang['reset_password_submit_btn']                            = 'ubah';
$lang['reset_password_validation_new_password_label']         = 'kata sandi baru';
$lang['reset_password_validation_new_password_confirm_label'] = 'konfirmasi kata sandi baru';
