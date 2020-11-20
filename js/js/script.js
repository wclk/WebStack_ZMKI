  var authModalId = "#ss-auth";

  axios.defaults.withCredentials = true;
  Vue.use(VeeValidate);
  var $authVue = new Vue({
    el: authModalId,
    data: {
      apiUrlRegister: authData.apiUrlRegister,
      apiUrlLogin: authData.apiUrlLogin,
      apiUrlLogout: authData.apiUrlLogout,
      apiUrlWeixin: authData.apiUrlWeixin,
      apiUrlWeibo: authData.apiUrlWeibo,
      apiUrlQq: authData.apiUrlQq,
      registerSuccessMessage: authData.registerSuccessMessage,
      loginRedirectUrl: authData.loginRedirectUrl,
      logoutRedirectUrl: authData.logoutRedirectUrl,

      form: '',
      title: '',
      register: {
        userName: '',
        displayName: '',
        email: '',
        mobile: '',
        password: ''
      },
      login: {
        account: '',
        password: ''
      },
      errorMessage: ''
    },
    methods: {
      registerSubmit: function () {
        var $this = this;
        this.$validator.validateAll('register_form').then((result) => {
          if (result) {
            $this.apiRegister();
          }
        });
      },
      apiRegister: function () {
        var $this = this;
        axios.post($this.apiUrlRegister, this.register)
          .then(function (response) {
            $this.form = 'registerSuccess';
          })
          .catch(function (error) {
            $this.errorMessage = error.response.data.message;
          });
      },
      loginSubmit: function () {
        var $this = this;
        this.$validator.validateAll('login_form').then((result) => {
          if (result) {
            $this.apiLogin();
          }
        });
      },
      apiLogin: function () {
        var $this = this;
        axios.post($this.apiUrlLogin, this.login)
          .then(function (response) {
            location.href = $this.loginRedirectUrl;
          })
          .catch(function (error) {
            $this.errorMessage = error.response.data.message;
          });
      },
      logout: function () {
        var $this = this;
        axios.post($this.apiUrlLogout)
          .then(function (response) {
            location.href = $this.logoutRedirectUrl;
          })
          .catch(function (error) {
            console.log(error.response.data.message);
          });
      },
      openModal: function () {
        this.errorMessage = '';
        var $this = this;

        if ($('#lean_overlay').length === 0) {
          $("body").append($("<div id='lean_overlay' style='position: fixed; z-index: 100; top: 0px; left: 0px; height: 100%; width: 100%; background: #000; display: block; opacity: 0.5;'></div>"));
        }
        $("#lean_overlay").click(function () {
          $this.closeModal();
        });
        $("#lean_overlay").css({
          "display": "block",
          opacity: 0
        });
        $("#lean_overlay").fadeTo(200, 0.5);

        var modal_height = $(authModalId).outerHeight();
        var modal_width = $(authModalId).outerWidth();

        $(authModalId).attr("style", "display: block !important; position: fixed !important;z-index: 11000 !important;left: 50% !important; margin-left: " + -(modal_width / 2) + "px !important; top: 100px !important;");

        $(authModalId).fadeTo(200, 1);
      },
      closeModal: function () {
        $("#lean_overlay").remove();
        this.form = '';
      },
      openLoginModal: function () {
        this.form = 'login';
        this.title = '用户登录';
        this.openModal();
      },
      openSocialModal: function () {
        this.form = 'social';
        this.title = '用户登录';
        this.openModal();
      },
      openRegisterModal: function () {
        this.form = 'register';
        this.title = '用户注册';
        this.openModal();
      }
    }
  });