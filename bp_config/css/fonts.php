<?php 
error_reporting(0);
$configFilePath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'site-info.php';
if (file_exists($configFilePath )) {
   require_once $configFilePath;
}else{
echo 'General configuration error';
}
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;500;600;700;800&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400;500;600;700;800&display=swap');
</style>

<!-- Option 1 for Open Sans -->
<?php if($pageConfig['font']== 1){ ?>
    <style>
        *{
            font-family: 'Open Sans', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 2 for Alegreya -->
<?php if($pageConfig['font']== 2){ ?>
    <style>
        *{
            font-family: 'Alegreya', serif;
        }
    </style>
<?php } ?>

<!-- Option 3 for Poppins -->
<?php if($pageConfig['font']== 3){ ?>
    <style>
        *{
            font-family: 'Poppins', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 4 for Roboto -->
<?php if($pageConfig['font']== 4){ ?>
    <style>
        *{
            font-family: 'Roboto', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 5 for Montserrat -->
<?php if($pageConfig['font']== 5){ ?>
    <style>
        *{
            font-family: 'Montserrat', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 6 for Lato -->
<?php if($pageConfig['font']== 6){ ?>
    <style>
        *{
            font-family: 'Lato', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 7 for Oswald -->
<?php if($pageConfig['font']== 7){ ?>
    <style>
        *{
            font-family: 'Oswald', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 8 for Raleway -->
<?php if($pageConfig['font']== 8){ ?>
    <style>
        *{
            font-family: 'Raleway', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 9 for Mulish -->
<?php if($pageConfig['font']== 9){ ?>
    <style>
        *{
            font-family: 'Mulish', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 10 for Nunito -->
<?php if($pageConfig['font']== 10){ ?>
    <style>
        *{
            font-family: 'Nunito', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 11 for Assistant -->
<?php if($pageConfig['font']== 11){ ?>
    <style>
        *{
            font-family: 'Assistant', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 12 for Barlow -->
<?php if($pageConfig['font']== 12){ ?>
    <style>
        *{
            font-family: 'Barlow', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 13 for Rubik -->
<?php if($pageConfig['font']== 13){ ?>
    <style>
        *{
            font-family: 'Rubik', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 14 for Work Sans -->
<?php if($pageConfig['font']== 14){ ?>
    <style>
        *{
            font-family: 'Work Sans', sans-serif;
        }
    </style>
<?php } ?>

<!-- Option 15 for Mukta -->
<?php if($pageConfig['font']== 15){ ?>
    <style>
        *{
            font-family: 'Mukta', sans-serif;
        }
    </style>
<?php } ?>