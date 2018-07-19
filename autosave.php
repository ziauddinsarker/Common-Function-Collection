<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
<html>  
      <head>  
           <meta name="viewport" content="initial-scale=1.0, user-scalable=no">  
           <meta charset="utf-8">  
           <title>Webslesson Tutorial</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <h2 align="center">Auto Save Data using Ajax, Jquery, PHP and Mysql</h2>  
                <br />  
                <div class="form-group">  
                     <label>Enter Post Title</label>  
                     <input type="text" name="post_title" id="post_title" class="form-control" />  
                </div>  
                <div class="form-group">  
                     <label>Enter Post Description</label>  
                     <textarea name="post_description" id="post_description" rows="6" class="form-control"></textarea>  
                </div>
    <div class="form-group">
     <button type="button" name="publish" class="btn btn-info">Publish</button>
    </div>
                <div class="form-group">  
                     <input type="hidden" name="post_id" id="post_id" />  
                     <div id="autoSave"></div>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      function autoSave()  
      {  
           var post_title = $('#post_title').val();  
           var post_description = $('#post_description').val();  
           var post_id = $('#post_id').val();  
           if(post_title != '' && post_description != '')  
           {  
                $.ajax({  
                     url:"save_post.php",  
                     method:"POST",  
                     data:{postTitle:post_title, postDescription:post_description, postId:post_id},  
                     dataType:"text",  
                     success:function(data)  
                     {  
                          if(data != '')  
                          {  
                               $('#post_id').val(data);  
                          }  
                          $('#autoSave').text("Post save as draft");  
                          setInterval(function(){  
                               $('#autoSave').text('');  
                          }, 5000);  
                     }  
                });  
           }            
      }  
      setInterval(function(){   
           autoSave();   
           }, 10000);  
 });  
 </script>
 
 

<div>
    Demo with example ajax call <a href="http://jsfiddle.net/MadLittleMods/NxQ4A/">here</a>
</div>
<br />

<form class="contact-form" method="post">
    First name: <input type="text" name="fname"><br>
    Last name: <input type="text" name="lname"><br>
    <input type="radio" name="sex" value="male">Male<br>
    <input type="radio" name="sex" value="female">Female<br>
    <input type="checkbox" name="vehicle" value="Bike">I have a bike<br>
    <textarea id="the-textarea"></textarea><br>
    <input type="submit" value="Submit">
</form>
<div class="form-status-holder"></div>


<script>
  var timeoutId;
$('form input, form textarea').on('input propertychange change', function() {
    console.log('Textarea Change');
    
    clearTimeout(timeoutId);
    timeoutId = setTimeout(function() {
        // Runs 1 second (1000 ms) after the last change    
        saveToDB();
    }, 1000);
});

function saveToDB()
{
    console.log('Saving to the db');
    
    // Now show them we saved and when we did
    var d = new Date();
    $('.form-status-holder').html('Saved! Last: ' + d.toLocaleTimeString());
}
</script>

</body>
</html>