/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

window.initDeleteDialog = function () {
    $('form.myAction').submit(function (e) {
        e.preventDefault();
        var that = this;
        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this record!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.value) {
            that.submit();
        }
    });
    });
};

import Login from './Login';
window.Login = Login;

import Masters from './pages/Masters';
window.Masters = Masters;

import Crmdata from './pages/Crmdata';
window.Crmdata = Crmdata;

import Generic from './Generic';
window.Generic = Generic;
