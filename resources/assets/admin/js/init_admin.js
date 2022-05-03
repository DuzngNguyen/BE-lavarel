import Global from "./common/_global";
import './../../library/bower_components/bootstrap/dist/js/bootstrap.min.js'
import './../../library/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'
import './../../library/bower_components/select2'
import './../../library/bower_components/jquery-ui/jquery-ui'
import './../../library/bower_components/fastclick/lib/fastclick.js'
import './../../library/bower_components/bootstrap-daterangepicker/daterangepicker.js'
import './../../library/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min'
import './../../library/dist/js/adminlte.min.js'
import './../../library/dist/js/demo.js'
import './../../library/plugins/iCheck/icheck'

import SettingEmail from "./components/_inc_email";
import Price from "./components/_inc_price";
import SEO from "./components/_inc_seo";
import ProductPage from "./components/_inc_product";
import Article from "./components/_inc_article";
import SettingGeneral from "./components/_inc_general";
import Nav from "./components/_inc_nav";
import ScrollTop from "./components/_inc_scrollTop";
import Acl from "./components/_inc_acl";
import Transaction from "./components/_inc_transaction";
import Module from "./components/_inc_sidebar_module";
import Dashboard from "./components/_inc_dashboard";
import User from "./components/_inc_user";

import InitFirebase from "./components/_init_firebase";

$(function () {
    SEO.init()
    Global.init()
    SettingEmail.init()
    Price.init()
    ProductPage.init()
    SettingGeneral.init()
    Nav.init()
    ScrollTop.init()
    Acl.init()
    Transaction.init()
    Module.init()
    Dashboard.init()
    Article.init()
    User.init()
    InitFirebase.init();
})
