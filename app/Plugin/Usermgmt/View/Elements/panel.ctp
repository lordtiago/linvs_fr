<div class="apps-board-view">
    <div class="app-container app-category-container">
        <a href="<?php echo $this->webroot.'people'?>">
            <div class="app app-people">
               <span class="glyphicon glyphicon-user"></span>
            </div>
            <p class="app-title"><?php echo __("People");?></p>
        </a>
    </div>
    <div class="app-container app-theme-container">
        <a href="<?php echo $this->webroot.'tithes'?>">
            <div class="app app-tithes">
              <span class="glyphicon glyphicon-heart"></span>
            </div>
            <p class="app-title"><?php echo __("Tithes");?></p>
        </a>
    </div>
    <div class="app-container app-profile-container">
        <a href="<?php echo $this->webroot.'usermgmt/Users/myprofile'?>">
            <div class="app app-profile">
               <span class="glyphicon glyphicon-user"></span>
            </div>
            <p class="app-title"><?php echo __("My Profile");?></p>
        </a>
    </div>
    <div class="app-container app-password-container">
        <a href="<?php echo $this->webroot.'usermgmt/Users/changePassword'?>">
            <div class="app app-password">
               <img src="<?php echo $this->webroot?>img/password-user_icon.png" />
            </div>
            <p class="app-title"><?php echo __("Change Password");?></p>
        </a>
    </div>     
<?php
if(isset($var['UserGroup']) && isset($var['UserGroup']['name']) && $var['UserGroup']['name']=='Admin'):
?>
    <div class="app-container app-users-container">
        <a href="<?php echo $this->webroot.'usermgmt/Users'?>">
            <div class="app app-user">
               <img src="<?php echo $this->webroot?>img/users_icon.png" />
            </div>
            <p class="app-title"><?php echo __("All Users");?></p>
        </a>
    </div>
    <div class="app-container app-online-users-container">
        <a href="<?php echo $this->webroot.'usermgmt/Users/online'?>">
            <div class="app app-online-user">
               <img src="<?php echo $this->webroot?>img/online-users_icon.png" />
            </div>
            <p class="app-title"><?php echo __("Online Users");?></p>
        </a>
    </div>    
    <div class="app-container app-groups-container">
        <a href="<?php echo $this->webroot.'usermgmt/UserGroups'?>">
            <div class="app app-group">
               <img src="<?php echo $this->webroot?>img/group_icon.png" />
            </div>
            <p class="app-title"><?php echo __("Groups");?></p>
        </a>        
    </div>   
    <div class="app-container app-group-permission-container">
        <a href="<?php echo $this->webroot.'usermgmt/UserGroupPermissions/permissionGroupMatrix'?>">
            <div class="app app-group-permission">
               <img src="<?php echo $this->webroot?>img/group-permissions_icon.png" />
            </div>
            <p class="app-title"><?php echo __("Group Permissions");?></p>
        </a>        
    </div>
    <div class="app-container app-mail-container">
        <a href="<?php echo $this->webroot.'usermgmt/UserEmails/send'?>">
            <div class="app app-mail">
               <img src="<?php echo $this->webroot?>img/mail_icon.png" />
            </div>
            <p class="app-title"><?php echo __("Email");?></p>
        </a>        
    </div> 
    <div class="app-container app-mail-templates-container">
        <a href="<?php echo $this->webroot.'usermgmt/UserEmailTemplates'?>">
            <div class="app app-mail-template">
               <img src="<?php echo $this->webroot?>img/email-template-white_icon.png" />
            </div>
            <p class="app-title"><?php echo __("Modelos de Email");?></p>
        </a>        
    </div>
    <div class="app-container app-mail-signatures-container">
        <a href="<?php echo $this->webroot.'usermgmt/UserEmailSignatures'?>">
            <div class="app app-mail-signature">
               <img src="<?php echo $this->webroot;?>img/mail-signature_icon.png" />
            </div>
            <p class="app-title"><?php echo __("Assinaturas de Email");?></p>
        </a>        
    </div>  
    <div class="app-container app-all-pages-container">
        <a href="<?php echo $this->webroot.'usermgmt/Contents'?>">
            <div class="app app-all-page">
               <img src="<?php echo $this->webroot?>img/all-pages-white_icon.png" />
            </div>
            <p class="app-title"><?php echo __("All Pages");?></p>
        </a>        
    </div> 
    <div class="app-container app-cake-logs-container">
        <a href="<?php echo $this->webroot.'usermgmt/UserSettings/cakelog '?>">
            <div class="app app-cake-log">
               <img src="<?php echo $this->webroot;?>img/logs_icon.png" />
            </div>
            <p class="app-title"><?php echo __("Cake Logs");?></p>
        </a>        
    </div>    
    <div class="app-container app-all-settings-container">
        <a href="<?php echo $this->webroot.'usermgmt/UserSettings'?>">
            <div class="app app-all-settings">
               <img src="<?php echo $this->webroot;?>img/all-settings_icon.png" />
            </div>
            <p class="app-title"><?php echo __("All Settings");?></p>
        </a>        
    </div>
    <div class="app-container app-delete-cache-container">
        <a href="<?php echo $this->webroot.'usermgmt/Users/deleteCache'?>">
            <div class="app app-delete-cache">
               <span class="glyphicon glyphicon-flash"></span>
            </div>
            <p class="app-title"><?php echo __("Delete Cache");?></p>
        </a>        
    </div> 
<?php
    endif;
?>
</div>