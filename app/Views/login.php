
<?php $this->session = \Config\Services::session();?>

    <div class="site-section bg-light" >
      <div class="container" >
        <div class="row" style="display: flex; justify-content:center; align-items:center; ">
          <div class="col-md-7 mb-5">

            

            <form action="login" method="post" class="p-5 bg-white" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
              <h2 class="mb-4 site-section-heading">Login</h2>

              <?= '<h3 style="color: red">'.$this->session->getFlashdata("err").'</h3>'  ?>

                <div class="col-md-6">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="col-md-6 mb-3 mb-md-3" >
                  <label class="text-black" for="password">Password</label>
                  <input type="text" id="password" name="password" class="form-control" placeholder="password">
                </div>
          
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Login" class="btn btn-primary py-2 px-4 text-white">

                
                </div>
                
              </div>
              <a href="register" class="btn btn-">Registruj se</a>

  
            </form>
          </div>
         
        </div>
      </div>
    </div>


    