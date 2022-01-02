<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('', 'UIController@index')->name('UI.index');
        Route::get('company', 'UIController@aboutCompany')->name('UI.aboutCompany');
        Route::get('projects', 'UIController@projects')->name('UI.projects');
        Route::get('services', 'UIController@services')->name('UI.services');
        Route::get('projectDetails/{id}-{project_slug}', 'UIController@projectDetails')->name('UI.projectDetails');

        Route::get('contact', 'UIController@contact')->name('UI.contact');
        Route::get('aboutCompany', 'UIController@aboutCompany')->name('UI.aboutCompany');
        Route::post('storeContact', 'UIController@storeContact')->name('UI.storeContact');

        Auth::routes();


        Route::group(['namespace' => 'Manager', 'prefix' => 'manager', 'middleware' => [
            'auth',
            'role:super_admin|editor'
        ]], function () {


            Route::get('dashboard', 'DashboardController@index')->name('dashboard');


            Route::get('userProfile', 'DashboardController@userProfile')->name('userProfile');
            Route::post('updateProfile', 'DashboardController@updateProfile')->name('updateProfile');


            // المسؤولين
            Route::get('users', 'UserController@index')->name('user.index');
            Route::get('user/add', 'UserController@create')->name('user.add');
            Route::post('user/store', 'UserController@store')->name('user.store');
            Route::get('user/getUserData', 'UserController@getUserData')->name('user.getUserData');
            Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
            Route::post('user/update/{id}', 'UserController@update')->name('user.update');
            Route::post('user/delete/{id}', 'UserController@destroy')->name('user.delete');


            // الموظفين
            Route::get('employees', 'EmployeeController@index')->name('employee.index');
            Route::get('employee/add', 'EmployeeController@create')->name('employee.add');
            Route::post('employee/store', 'EmployeeController@store')->name('employee.store');
            Route::get('employee/getEmployeeData', 'EmployeeController@getEmployeeData')->name('employee.getEmployeeData');
            Route::get('employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
            Route::post('employee/update/{id}', 'EmployeeController@update')->name('employee.update');
            Route::post('employee/delete/{id}', 'EmployeeController@destroy')->name('employee.delete');







            // Slider
            Route::get('sliders', 'SliderController@index')->name('slider.index');
            Route::get('slider/add', 'SliderController@create')->name('slider.add');
            Route::post('slider/store', 'SliderController@store')->name('slider.store');
            Route::get('slider/getSliderData', 'SliderController@getSliderData')->name('slider.getSliderData');
            Route::get('slider/edit/{id}', 'SliderController@edit')->name('slider.edit');
            Route::post('slider/update/{id}', 'SliderController@update')->name('slider.update');
            Route::post('slider/delete/{id}', 'SliderController@destroy')->name('slider.delete');



            // الشركات
            Route::get('clients', 'CompanyController@index')->name('company.index');
            Route::get('client/add', 'CompanyController@create')->name('company.add');
            Route::post('client/store', 'CompanyController@store')->name('company.store');
            Route::get('client/getCompanyData', 'CompanyController@getCompanyData')->name('company.getCompanyData');
            Route::get('client/edit/{id}', 'CompanyController@edit')->name('company.edit');
            Route::post('client/update/{id}', 'CompanyController@update')->name('company.update');
            Route::post('client/delete/{id}', 'CompanyController@destroy')->name('company.delete');


            // العملاء
            Route::get('partners', 'PartnerController@index')->name('partner.index');
            Route::get('partner/add', 'PartnerController@create')->name('partner.add');
            Route::post('partner/store', 'PartnerController@store')->name('partner.store');
            Route::get('partner/getPartnerData', 'PartnerController@getPartnerData')->name('partner.getPartnerData');
            Route::get('partner/edit/{id}', 'PartnerController@edit')->name('partner.edit');
            Route::post('partner/update/{id}', 'PartnerController@update')->name('partner.update');
            Route::post('partner/delete/{id}', 'PartnerController@destroy')->name('partner.delete');



            // How works
            Route::get('how_works', 'HowworkController@index')->name('how_works.index');
            Route::get('how_works/add', 'HowworkController@create')->name('how_works.add');
            Route::post('how_works/store', 'HowworkController@store')->name('how_works.store');
            Route::get('how_works/getHowWorkData', 'HowworkController@getHowWorkData')->name('how_works.getHowWorkData');
            Route::get('how_works/edit/{id}', 'HowworkController@edit')->name('how_works.edit');
            Route::post('how_works/update/{id}', 'HowworkController@update')->name('how_works.update');
            Route::post('how_works/delete/{id}', 'HowworkController@destroy')->name('how_works.delete');




            // الخدمات
            Route::get('services', 'ServiceController@index')->name('service.index');
            Route::get('service/add', 'ServiceController@create')->name('service.add');
            Route::post('service/store', 'ServiceController@store')->name('service.store');
            Route::get('service/getServiceData', 'ServiceController@getServiceData')->name('service.getServiceData');
            Route::get('service/edit/{id}', 'ServiceController@edit')->name('service.edit');
            Route::post('service/update/{id}', 'ServiceController@update')->name('service.update');
            Route::post('service/delete/{id}', 'ServiceController@destroy')->name('service.delete');




            // project
            Route::get('projects', 'ProjectController@index')->name('project.index');
            Route::get('project/add', 'ProjectController@create')->name('project.add');
            Route::post('project/store', 'ProjectController@store')->name('project.store');
            Route::get('project/getProjectData', 'ProjectController@getProjectData')->name('project.getProjectData');
            Route::get('project/edit/{id}', 'ProjectController@edit')->name('project.edit');
            Route::post('project/update/{id}', 'ProjectController@update')->name('project.update');
            Route::post('project/delete/{id}', 'ProjectController@destroy')->name('project.delete');

            // For Images
            Route::get('project/uplodeImage/{id}', 'ProjectController@uplodeImage')->name('project.uplodeImage');
            Route::post('project/storeImages/{id}', 'ProjectController@storeImages')->name('project.storeImages');
            Route::get('project/deleteImage/{id}/{project_id}', 'ProjectController@deleteImage')->name('project.deleteImage');
            Route::get('project/uplodedImages/{id}', 'ProjectController@uplodedImages')->name('project.uplodedImages');


            // history
            Route::get('history/edit/{id}', 'HistoryController@edit')->name('history.edit');
            Route::post('history/update/{id}', 'HistoryController@update')->name('history.update');
            Route::get('history/deleteHistoryDate/{id}', 'HistoryController@deleteHistoryDate')->name('history.deleteHistoryDate');




            // LeaderShip
            Route::get('administrations', 'LeaderShipController@index')->name('leader_ship.index');
            Route::get('administration/add', 'LeaderShipController@create')->name('leader_ship.add');
            Route::post('administration/store', 'LeaderShipController@store')->name('leader_ship.store');
            Route::get('administration/getLeaderShipData', 'LeaderShipController@getLeaderShipData')->name('leader_ship.getLeaderShipData');
            Route::get('administration/edit/{id}', 'LeaderShipController@edit')->name('leader_ship.edit');
            Route::post('administration/update/{id}', 'LeaderShipController@update')->name('leader_ship.update');
            Route::post('administration/delete/{id}', 'LeaderShipController@destroy')->name('leader_ship.delete');


            // visible == Mission Vission
            Route::get('visibles', 'VisibleController@index')->name('visible.index');
            Route::get('visible/add', 'VisibleController@create')->name('visible.add');
            Route::post('visible/store', 'VisibleController@store')->name('visible.store');
            Route::get('visible/getVisibleData', 'VisibleController@getVisibleData')->name('visible.getVisibleData');
            Route::get('visible/edit/{id}', 'VisibleController@edit')->name('visible.edit');
            Route::post('visible/update/{id}', 'VisibleController@update')->name('visible.update');
            Route::post('visible/delete/{id}', 'VisibleController@destroy')->name('visible.delete');




            // ManagerWordController
            Route::get('manager_word/edit/{id}', 'ManagerWordController@edit')->name('manager_word.edit');
            Route::post('manager_word/update/{id}', 'ManagerWordController@update')->name('manager_word.update');


            //
            Route::get('news_letters', 'NewsletterController@index')->name('news_letter.index');
            Route::get('news_letter/getNewsLetterData', 'NewsletterController@getNewsLetterData')->name('news_letter.getNewsLetterData');


            // About Us
            Route::get('about/edit/{id}', 'AboutController@edit')->name('about.edit');
            Route::post('about/update/{id}', 'AboutController@update')->name('about.update');
            Route::post('about/storeImages/{id}', 'AboutController@storeImages')->name('about.storeImages');
            Route::get('about/deleteImage/{id}/{about_id}', 'AboutController@deleteImage')->name('about.deleteImage');
            Route::get('about/uplodedImages/{id}', 'AboutController@uplodedImages')->name('about.uplodedImages');

            //  Contacts
            Route::get('contacts', 'ContactController@index')->name('contact.index');
            Route::get('contact/getContactData', 'ContactController@getContactData')->name('contact.getContactData');
            Route::post('contact/delete/{id}', 'ContactController@destroy')->name('contact.delete');
            Route::get('contact/show/{id}', 'ContactController@show')->name('contact.show');




            // SettingController
            Route::get('setting/edit/{id}', 'SettingController@edit')->name('setting.edit');
            Route::post('setting/update/{id}', 'SettingController@update')->name('setting.update');
        });
    }
);
