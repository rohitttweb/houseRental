<style>
  * {
    margin: 0;
  }

  /* Header Styles */
  header {
    background-color: #fff;
    box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
    padding: 15px;
  }

  nav {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
  }

  .logo {
    width: 50px;
    height: 50px;
    background-color: #007bff;
    border-radius: 50%;
    display: inline-block;
  }

  .navlinks ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: inline-block;
  }

  .navlinks ul li {
    display: inline-block;
    margin-right: 20px;
  }

  .navlinks ul li a {
    color: #333;
    text-decoration: none;
    font-size: 16px;
  }

  .navlinks ul li a:hover {
    color: #007bff;
  }
</style>
<header>
  <nav>
    <div class="logo"></div>
    <div class="navlinks">
      <uL>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </uL>
    </div>
  </nav>
</header>