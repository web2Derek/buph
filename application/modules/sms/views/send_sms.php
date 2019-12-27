<div class="container sms-wrapper">
  <div class="col-12">
    <div class="card sms-card">
      <h5 class="card-title titleheader">SEND SMS</h5>
      <div class="card_body">

        <div class="d-flex justify-content-end">
          <div class="row button-group">
            <button type="button" class="btn btn-rounded btn-success btn-sm" id="sms_ip_address" name="button" data-toggle="modal" data-target="#sms_ip"> <i class=" fas fa-users"></i> Setup IP</button>
            <button type="button" class="btn btn-rounded btn-success btn-sm" id="create-contact" name="button" data-toggle="modal" data-target="#contact_modal"> <i class=" fas fa-users"></i> Create Contact Group</button>
            <button type="button" class="btn btn-rounded btn-info btn-sm" id="btn-individual" name="button" data-toggle="modal" data-target="#sent_single_modal">
              <i class=" fas fa-user"></i> Send to Individual</button>
              <button type="button" class="btn btn-rounded btn-primary btn-sm" id="btn-group" name="button" data-toggle="modal" data-target="#sent_group_modal">
                <i class="fas fa-users"></i> Send to Group</button>
              </div>
            </div>
          </div>

          <!-- <form class="form-horizontal" id="sent_individual" style="display:none;">
          <div class="form-group">
          <h3 class="text-center">Sent to Individual</h3>
          <div class="col-xs-8">
          <h5 class="m-t-30">Phone Number</h5>
          <select class="selectpicker" multiple data-style="form-control btn-secondary" name="to" >
          <option>09999716386</option>
          <option>09058049087</option>
          <option>4</option>
          <option>3</option>
          <option>2</option>
          <option>1</option>
        </select>

      </div>
    </div> -->

    <!-- <div class="form-group">
    <div class="form-group col-xs-4">
    <button type="button" class="btn btn-primary btn-sm" name="search_contact">Search Contact</button>
    <button type="button" class="btn btn-primary btn-sm" name="search_contact">Add Contact</button>
  </div>
</div> -->
<!--
<div class="form-group">
<div class="col-xs-12">
<label for="message">SMS Message</label>
<textarea name="message" id="message" maxlength="250" class="form-control"></textarea>
<sub class="text-info text-char" name="charNum" id="charNum" value="250">250</sub>
</div>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary btn-sm" name="sent_sms">SENT</button>
</div>
</form> -->

<!-- SMS FOR SENDING BY GROUP -->
<!-- <form class="form-horizontal" id="sent_group" style="display:none;">
<div class="form-group">
<h3 class="text-center">Sent to Group</h3>
<div class="col-xs-8">
<h5 class="m-t-30">Phone Number</h5>
<select class="selectpicker" multiple data-style="form-control btn-secondary">
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
</select>

</div>
</div> -->

<!-- <div class="form-group">
<div class="form-group col-xs-4">
<button type="button" class="btn btn-primary btn-sm" name="search_contact">Search Contact</button>
<button type="button" class="btn btn-primary btn-sm" name="search_contact">Add Contact</button>
</div>
</div> -->

<!-- <div class="form-group">
<div class="col-xs-12">
<label for="sms_message">SMS Message</label>
<textarea name="message" id="message" maxlength="250" class="form-control"></textarea>
<sub class="text-info text-char" name="charNum" id="charNum" value="250">250</sub>
</div>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary btn-sm" name="sent_sms">SENT</button>
</div>
</form>
</div> -->
</div>
</div>
</div>

<!-- SMS IP -->
<div class="modal fade in" id="sms_ip" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel1">SETUP IP ADDRESS</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
        <div class="modal-body">
          <form class="form-material" id="sms_ip_setup">
            <div class="form-group">
              <h4>Current IP: <span id="current_ip"></span></h4>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="" id="ip_address" placeholder="IP Address">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
              <button type="button" id="remove_ip" class="btn btn-danger btn-sm">Remove Current IP</button>
              <button type="submit" class="btn btn-primary btn-sm" id="btn-save-ip" name="sent-sms">Saved</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>


<!-- SENT SMS INDIVIDUAL -->
<div class="modal fade in" id="sent_single_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel1">SEND SMS TO INDIVIDUAL CONTACT</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <select class="form-control" id="sms-template" name="sms-template" required>
            <option value="" selected>Choose Template...</option>
            <?php foreach($sms_template as $template):?>
              <option value="<?= $template['sms_message']; ?>"><?= $template['sms_title']; ?></option>
            <?php endforeach;?>
          </select>
          <br/>
        </div>

        <!-- SPINNER WHEN SUBMITTING -->
        <button class="btn btn-primary spinner" type="button" disabled>
          <p>Sending SMS...</p>
          <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </button>

        <form id="sent_individual">
          <div class="form-group">
            <label for="to" class="control-label">Recipient:</label>
            <select  id="to" name="to" multiple data-style="btn-secondary" required>
              <?php foreach($number as $contact): ?>
                <option value="<?= $contact['mobile_no']; ?>">
                  <?= $contact['last_name']; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control" name="message" id="message" required></textarea>
            <sub id="charNum">160</sub>
          </div>
          <div class="form-group">
            <button type="button" id="btn-clear-single" class="btn btn-info btn-sm" name="btn-clear-single">Clear</button>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-sm" id="btn-send-individual" name="sent-sms">Send message</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>
<!-- /.modal -->

<!-- SENT TO GROUP -->
<div class="modal fade in" id="sent_group_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel1">SEND SMS TO GROUP CONTACT</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <select class="form-control" id="sms-group-template" name="sms-group-template" required>
            <option value="" selected>Select template...</option>
            <?php foreach($sms_template as $template):?>
              <option value="<?= $template['sms_message']; ?>">
                <?= $template['sms_title']; ?></option>
              <?php endforeach;?>
            </select>
            <!-- <button class="btn btn-info btn-sm" type="button" id="btn-group-insert" name="btn-group-insert">Insert Template</button> -->
          </div>

          <!-- SPINNER WHEN SUBMITTING -->
          <button class="btn btn-primary spinner" type="button" disabled>
            <p>Sending SMS...</p>
            <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </button>
          <form id="group_contact">
            <div class="form-group">
              <label for="group-list" class="control-label">Recipient Group:</label>
              <select id="group_list" name="group_list[]" multiple data-style="btn-secondary" required>
                <?php foreach($group_list as $name): ?>
                  <option value="<?= $name['group_name']?>"><?= $name['group_name']?></option>
                <?php endforeach; ?>
              </select>

            </div>
            <div class="form-group">
              <label for="message-text" class="control-label">Message:</label>
              <textarea class="form-control" name="group_message" id="group_message" required></textarea><sub id="groupcharNum">160</sub>
            </div>
            <div class="form-group">
              <button type="button" id="btn-clear-group" class="btn btn-info btn-sm" name="btn-clear-group">Clear</button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm" id="btn-send-group">Send message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.modal -->

  <!-- MODAL FOR CREATING CONTACT -->

  <div class="modal fade in" id="contact_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="contact_header">CREATE CONTACT GROUP</h4></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form method="POST" id="add-contact-list">
            <div class="form-group">
              <label for="group-name">Group Name:</label>
              <input type="text" class="form-control" name="group-name" id="group-name" autocomplete="off" > <span class="err-group"></span>
            </div>
            <div class="form-group">
              <label for="contact_list">Select Member Contact</label>
              <select id="contact_list" name="contact_list[]" multiple placeholder="">
                <?php foreach($number as $contact): ?>
                  <option value="<?= $contact['mobile_no']; ?>">
                    <?= $contact['last_name']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <!-- <div class="form-group">
              <button type="button" id="btn-clear" class="btn btn-info btn-sm" name="btn-clear">Clear</button>
            </div> -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-sm" id="btn-group-contact" name="btn-group">Save Group</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
