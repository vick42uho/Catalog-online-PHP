var menuHolder = document.getElementById('menuHolder')
    var siteBrand = document.getElementById('siteBrand')
    function menuToggle(){
      if(menuHolder.className === "drawMenu") menuHolder.className = ""
      else menuHolder.className = "drawMenu"
    }
    if(window.innerWidth < 426) siteBrand.innerHTML = "MAS"
    window.onresize = function(){
      if(window.innerWidth < 420) siteBrand.innerHTML = "MAS"
      else siteBrand.innerHTML = "MY AWESOME WEBSITE"
    }

    document.getElementById('login-form').addEventListener('submit', function (event) {
      event.preventDefault();
    
      // ตรวจสอบ username และ password ที่กรอกเข้ามา
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;
    
      // ตรวจสอบตามเงื่อนไขของคุณ
      if (username === 'your_username' && password === 'your_password') {
        alert('Login Successful');
      } else {
        alert('Login Failed. Please check your username and password.');
      }
    });
    