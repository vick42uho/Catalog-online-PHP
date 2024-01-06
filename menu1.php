<div class="p-3 bg-dark text-white">
  <div class="flexMain">
    <div class="flex1">
      
    </div>
    <div class="flex2 text-center">
      <div><strong>This site design is awesome. Try it</strong></div>
    </div>
    <div class="flex1">
      
    </div>
  </div>
</div>
<div id="menuHolder">
  <div role="navigation" class="sticky-top border-bottom border-top" id="mainNavigation">
    <div class="flexMain">
      <div class="flex2">
        <button class="whiteLink siteLink" style="border-right:1px solid #eaeaea" onclick="menuToggle()"><i class="fas fa-bars me-2"></i> MENU</button>
      </div>
      <div class="flex3 text-center" id="siteBrand">
        MY AWESOME SITE
      </div>
      
      <div class="flex2 text-end d-block d-md-none">
        <button class="whiteLink siteLink"><i class="fas fa-search"></i></button>
      </div>
      
      <div class="flex2 text-end d-none d-md-block">
        <button class="whiteLink siteLink">REGISTER</button>
        <button class="blackLink siteLink">Login</button>
      </div>
    </div>
  </div>
  
  <div id="menuDrawer">
    <div class="p-4 border-bottom">
      <div class='row'>
        <div class="col">
          <select class="noStyle">
            <option value="english">English</option>
            <option value="spanish">Spanish</option>
            <option value="french">French</option>
            <option value="italian">Italian</option>
            <option value="hebrew">Hebrew</option>
          </select>
        </div>
        <div class="col text-end ">
          <i class="fas fa-times" role="btn" onclick="menuToggle()"></i>
        </div>
      </div>
    </div>
    <div>
      <a href="#" class="nav-menu-item"><i class="fas fa-home me-3"></i>Home</a>
      <a href="#" class="nav-menu-item"><i class="fab fa-product-hunt me-3"></i>Products</a>
      <a href="#" class="nav-menu-item"><i class="fas fa-search me-3"></i>Explore</a>
      <a href="#" class="nav-menu-item"><i class="fas fa-wrench me-3"></i>Services</a>
      <a href="#" class="nav-menu-item"><i class="fas fa-dollar-sign me-3"></i>Pricing</a>
      <a href="#" class="nav-menu-item"><i class="fas fa-file-alt me-3"></i>Blog</a>
      <a href="#" class="nav-menu-item"><i class="fas fa-building me-3"></i>About Us</a>
    </div>
  </div>
</div>
<style>
.flexMain {
display:flex;
align-items: center
}
.flex1 { flex:1 }
.flex2 { flex:2 }
.flex3 { flex:3 }

button.siteLink {
margin-left:-5px;
border:none;
padding:24px;
display:inline-block;
min-width:115px;
}
.whiteLink {
background : #fff;
}
.whiteLink:active {
background : #000;
color: #fff;
}
.blackLink {
color: #fff;
background:#232323;
transition: all 300ms linear;
}

.blackLink:active {
color: #000;
background:#fff
}
#siteBrand {
font-family: impact;
letter-spacing : -1px;
font-size:32px;
color:#252525;
line-height : 1em;
}
#menuDrawer {
background:#fff;
position:fixed;
height:100vh;
overflow:auto;
z-index:12312;
top:0;
left:0;
border-right:1px solid #eaeaea;
min-width:25%;
max-width:320px;
width:100%;
transform : translateX(-100%);
transition : transform 200ms linear;
}
#mainNavigation {
transition : transform 200ms linear;
background : #fff;
}
.drawMenu > #menuDrawer {
transform : translateX(0%);
}
.drawMenu > #mainNavigation {
transform : translateX(25%);
}
.fa-times {
cursor : pointer
}
a.nav-menu-item:hover {
margin-left:2px;
border-left:10px solid black;
}
a.nav-menu-item{
transition:border 200ms linear;
text-decoration:none;
display:block;
padding:18px;
padding-left:32px;
border-bottom:1px solid #eaeaea;
font-weight:bold;
color:#343434
}
select.noStyle {
border:none;
outline:none
}
</style>
<script>
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
</script>