
 <div class="row ">
        <div class="col-lg-2">
          <h3>Lista de Estudiantes</h3>   
        </div>
        <div class="col-lg-8 mt-12" >
            <form action="" method="get">
        
                            <div class="input-group col-md-12">
                                <input type="text" value="<?php if(isset($_GET['search_input'])){echo $_GET['search_data'];} ?>"  id="search_data" name="search_data"  class="form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="button button-green" type="submit">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
            
            
        </form>
                    
       </div>
          <div class="col-lg-2 ">
              <button  class="button button-purple mt-12 pull-right" data-toggle="modal" data-target="#create_student_info_modal"> Create Student</button> 
      
          </div>
    </div>
         <?php 
        
        if($this->session->flashdata('message')){
                echo "<p class='custom-alert'>".$this->session->flashdata('message');"</p>";
        // unset($_SESSION['message']);
       }
     
        ?>
<table class="table">
            <thead>
                <tr>
             
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Cedula</th>
                    <th>Genero</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                
          
                <?php

                if(isset($student_list)){
                    foreach ($student_list as $key => $value) {
                        
                ?>

                <tr >
                   
                    <td><?php echo  $value['student_name'];?></td>
                    <td><?php echo  $value['email_address'];?></td>
                    <td><?php echo  $value['contact'];?></td>
                    <td><?php echo  $value['gender'];?></td>
                    
                 
                <td class="text-right">
                
                    <a onclick="delete_person(<?php echo $value['student_id'];?>);" >    class="button button-red" >Delete</a> 
                
                </td>
                    
                    
                    
                </tr>
                
                <?php
                
                    }
                }
                ?>
                

           </tbody>
        </table>
    

<div class="pull-right">
 
   <?php if(isset($pagination)) {
       echo $pagination;
                
        }
        ?>
   
</div>
<script type="text/javascript">
  
  var save_method; //for save method string
  var table;
  function add_person()
  {
    save_method = 'add';

  }
  function save()
  {
    var url;
    if(save_method == 'add')
    {
        url = "<?php echo site_url('personas/perosona_add')?>";
    }
                // ajax adding data to database
                $.ajax({
                url : url,
                type: "POST",
                data: $('#create_student_info_frm').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                    location.reload();// for reload a page
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error al agregar persona.');
                }
            });
        }
        function delete_person(id)
        {
            if(confirm('Esta seguro de eliminarla?'))
            { 
            console.log(id);
            // ajax delete data from database
                $.ajax({
                url : "<?php echo site_url('personas/person_delete')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    location.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error al eliminar persona');
                }
            });
            }
        }
</script>
 <div class="modal fade" id="create_student_info_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Student Info</h4>
        </div>
        <div class="modal-body">
         
            <form method="post"  id="create_student_info_frm" action="<?php echo site_url('student/create_student_info'); ?>" >
            <div class="form-group">
                <label for="student_name">Name:</label>
                <input type="text" name="student_name" id="student_name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="email_address">Email address:</label>
                <input type="email" class="form-control" name="email_address" id="email_address" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" name="contact" id="contact"  maxlength="50">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="" selected>Select</option>
                    <option value="Male" >Male</option>
                    <option value="Female" >Female</option>
                </select>
            </div> 
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" name="country" id="country" class="form-control"  maxlength="50">
            </div>
                <div class="form-group mb-50">
            <input type="submit" class="button button-green  pull-right"  value="Submit"/>
                </div>
                
        </form> 
    
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>


    </div>
  </div> 