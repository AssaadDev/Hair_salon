
<?php $this->session = \Config\Services::session();?>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row" style="display: flex; justify-content:center; align-items:center; ">
          <div class="col-md-7 mb-5">

            

            <form action="booking" class="p-5 bg-white" method="post">
              <h1 class="mb-4 site-section-heading">Zakazi termin</h1>
                <?= '<p style="color: green; text-align: center"><b>'.$this->session->getFlashdata("msg").'</b></p>'?>
              <input type="hidden" name="id"    value="<?= $this->session->get('id'); ?>">
              <input type="hidden" name="fname" value="<?= $this->session->get('fname'); ?>">
              <input type="hidden" name="lname" value="<?= $this->session->get('lname'); ?>">
              <input type="hidden" name="phone" value="<?= $this->session->get('phone'); ?>">
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="date">Dan</label> 
                  <input type="text" id="date" name="datum" class="form-control datepicker px-2" placeholder="Date of visit">
                </div>
                <div class="col-md-6" >
                <!--  <label class="text-black" for="time">Vrijeme termina</label> 
                  <input type="text" id="time" class="form-control" name="vrijeme" placeholder="Time">
                -->
                <label class="text-black" for="time">Vrijeme termina</label>
                <div style="display: flex; flex-direction: row">
                <div class="col-md-4">
                <input type="number" min="0" max="23" placeholder="23" id="sati" name="sati" class="form-control px-2">
                </div>
                <p style="font-size: 25px">:</p>
                <div class="col-md-4">
                <input type="number" min="0" max="59" placeholder="00" id="minute" name="minute" class="form-control px-2">
                </div></div>
              </div></div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="treatment">Usluge Koje Zelite ? </label> 
                    <input type="text" id="usluga" class="form-control" name="usluga">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="note">Vase pitanje/zahtijev?</label> 
                  <textarea name="note" id="note" cols="30" rows="5" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send" name="book" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>

  
            </form>
          </div>
         
        </div>
      </div>
    </div>


  