


    <div class="site-section bg-light" >
      <div class="container" >
        <div class="row" style="display: flex; justify-content:center; align-items:center; ">
          <div class="col-md-7 mb-5">

            

            <form action="/register"  method="post" class="p-5 bg-white" style="display: flex; justify-content:center; align-items:center; flex-direction:column;">
              <h2 class="mb-4 site-section-heading">Login</h2>

              

                <div class="col-md-6">
                  <label class="text-black" for="fname">Ime</label> 
                  <input type="text" id="fname" name="fname" class="form-control" value="<?= set_value('fname') ?>">
                </div>
                <div class="col-md-6 mb-3 mb-md-3" >
                  <label class="text-black" for="lname">Prezime</label>
                  <input type="text" id="lname" name="lname" class="form-control" value="<?= set_value('lname') ?>">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control" value="<?= set_value('email') ?>">
                </div>
                <div class="col-md-6 mb-3 mb-md-3" >
                  <label class="text-black" for="password">Sifra</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="Sifra...">
                </div>
                <div class="col-md-6 mb-3 mb-md-3" >
                  <label class="text-black" for="cpassword">Potvrdi Sifru</label>
                  <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Potvrdite Sifru">
                </div>
                <div class="col-md-6 mb-3 mb-md-3" >
                  <label class="text-black" for="phone">Broj Telefona</label>
                  <input type="number" id="phone" name="phone" class="form-control" placeholder="Broj Telefona">
                </div>
                <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
        
          
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Registruj Se" class="btn btn-primary py-2 px-4 text-white">

                
                </div>
                
              </div>
              <a href="login" class="btn btn-">Vec imate nalog ?</a>

  
            </form>
          </div>
         
        </div>
      </div>
    </div>


    