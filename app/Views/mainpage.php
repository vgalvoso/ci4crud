<div class=" table-responsive-sm">
<table class="table table-striped table-sm small">
<thead>
    <tr>
        <th> Photo </th>
        <th> Username </th>
        <th> First name </th>
        <th> Middle name </th>
        <th> Last name </th>
        <th> Birthday </th>
        <th> Contact Number </th>
        <th> Action </th>
    </tr>
    <tr>
    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('users/add'); ?>">
        <th> 
            <img id="selected_pic" class="img-thumbnail">
            <input type="file" name="userpic" id="inp_pic" /> 
        </th>
        <th> <input type="text" name="username" id="inp_username" class="border-bot border-primary" /> </th>
        <th> <input type="text" name="firstname" id="inp_firstname" class="border-bot border-primary" /> </th>
        <th> <input type="text" name="middlename" id="inp_middlename" class="border-bot border-primary" /> </th>
        <th> <input type="text" name="lastname" id="inp_lastname" class="border-bot border-primary" /> </th>
        <th> <input type="date" name="birthday" id="inp_bitrthday" class="border-bot border-primary" /> </th>
        <th> <input type="text" name="contact_number" id="inp_contactnumber" class="border-bot border-primary" /> </th>
        <th> <input type="submit" name="save_user" id="btn_add_record" value="Add" class="btn btn-success btn-sm"/> </th>
    </tr>
    </form>
</thead>
<tbody>
    <?php 
        foreach($users_detail as $user):
    ?>
    <tr>
        <form method="post" action="<?= base_url().'/users/update/'.$user['id']?>" onsubmit="return confirm('Are you sure you want to update?');">
        <td> <img class="img-thumbnail" src="<?= WRITEPATH.'uploads\\'.$user['photo']?>"/> </td>
        <td> <input type="text" class="border" name="username" value="<?= $user["username"] ?>"> </td>
        <td> <input type="text" class="border" name="firstname" value="<?= $user["firstname"] ?>"> </td>
        <td> <input type="text" class="border" name="middlename" value="<?= $user["middlename"] ?>"> </td>
        <td> <input type="text" class="border" name="lastname" value="<?= $user["lastname"] ?>"> </td>
        <td> <input type="date" class="border" name="birthday" value="<?= $user["birthday"] ?>"> </td>
        <td> <input type="text" class="border" name="contactnumber" value="<?= $user["contactnumber"] ?>"> </td>
        <td>
            <input type="submit" class="btn btn-sm bg-primary text-white" value="Edit" />
            <a href="<?= base_url();?>/users/delete/<?= $user['id']?>">
                <input type="button" class="btn btn-sm bg-danger text-white" value="Delete" />
            </a>
        </td>
        </form>
    </tr>
    <?php endforeach; ?>
</tbody>
</table>
</div>