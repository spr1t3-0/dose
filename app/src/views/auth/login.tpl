<!DOCTYPE html>
<html lang="en">
  <head>
    {{include file="../include/head.tpl"}}
  </head>
  <body>

    <div id="content">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="card text-center">

            <h2>dose | the lowercase dosage tracker.<br>
                login to access this app</h2>
            <hr>

            <form class="row g-3" action="/login" method="post">

              <div class="col col-lg-2"></div>

  <div class="col col-lg-8">
              <div class="form-group">
                <label for="login">your login name</label>
                <input type="text" class="form-control" id="login" name="login">
              </div>

              <div class="form-group ">
                <label for="password">your password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>


            <button type="submit" class="btn btn-primary">> login <</button>
        </div> <!-- end col-->

  <div class="col col-lg-2"></div>

            </form>

          </div>
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>


  </body>
</html>
