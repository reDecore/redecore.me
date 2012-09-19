{literal}
<style>
#profileEdit div#genderOptions { width: 60%; }
#profileEdit #genderOptions ul { border-top: none; }
#profileEdit #genderOptions li { display: inline; width: auto; clear: none; padding: 4px 0 0 0; margin-right: 64px;}
#profileEdit #genderOptions li input { margin-top: 4px; }
</style>
{/literal}
<div class="FixedContainer">
    <form id="profileEdit" class="Form StaticForm" action="{$baseurl}/settings" method="POST" style="padding-top:20px;" enctype="multipart/form-data">
    {include file='error.tpl'} 
        <h3>{$lang215}</h3>
        <ul>
            
            <li>
                <label for="id_link">{$lang247}</label>
                <div class="Right">
                	<input type="text" name="email" value="{$smarty.session.EMAIL|stripslashes}" id="email" />
                    <span class="help_text">{$lang248}</span>
                </div>
            </li>
            
            <li>
                <label for="id_link">{$lang101}</label>
                <div class="Right">
                	<input type="text" name="fname" value="{$smarty.session.FNAME|stripslashes}" id="fname" />
                </div>
            </li>
            
            <li>
                <label for="id_link">{$lang102}</label>
                <div class="Right">
                	<input type="text" name="lname" value="{$smarty.session.LNAME|stripslashes}" id="lname" />
                </div>
            </li>
            
            <li>
                <label for="id_link">{$lang13}</label>
                <div class="Right">
                	<input type="text" name="username" value="{$smarty.session.USERNAME|stripslashes}" id="username" />
                    <span class="help_text">{$lang249}</span>
                </div>
            </li>
            
            <li>
                <label for="id_gender_0">{$lang252}</label>
                <div class="Right" id="genderOptions">
                    <ul>
                    <li><label for="id_gender_0"><input {if $u.gender eq "1"}checked="checked"{/if} type="radio" id="id_gender_0" value="1" name="gender" /> {$lang253}</label></li>
                    <li><label for="id_gender_1"><input {if $u.gender eq "2"}checked="checked"{/if} type="radio" id="id_gender_1" value="2" name="gender" /> {$lang254}</label></li>
                    <li><label for="id_gender_2"><input {if $u.gender eq "0"}checked="checked"{/if} type="radio" id="id_gender_2" value="0" name="gender" /> {$lang255}</label></li>
                    </ul>
                    
                </div>
            </li>

            <li>
                <label for="id_about">{$lang208}</label>
                <div class="Right">
                    <textarea id="id_about" rows="3" cols="54" name="about">{$u.description|stripslashes}</textarea>
                    <div class="CharacterCount" id="aboutCount"></div>
                    
                </div>
            </li>

            <li>
                <label for="id_location">{$lang256}</label>
                <div class="Right">
                    <input type="text" name="location" id="id_location" value="{$u.location|stripslashes}" />
                    <span class="help_text">{$lang257}</span>
                    
                </div>
            </li>

            <li>
                <label for="id_website">{$lang258}</label>
                <div class="Right">
                    <input type="text" name="website" id="id_website" value="{$u.website|stripslashes}" />
                </div>
            </li>

            <li>
                <label for="id_img">{$lang259}</label>
                <div class="Right">
                    
                    <div class="current_avatar_wrapper">
                      <img src="{$murl}/{insert name=get_member_profilepicture value=var assign=mypp profilepicture=$smarty.session.PP}{$mypp}?{$smarty.now}" class="current_avatar floatLeft" />
                    </div>
                </div>
            </li>
            
            <li>
                <label for="id_img">{$lang260}</label>
                <div class="Right">
                    <p><input id="gphoto" type="file" name="gphoto" size="6" /></p>                        
                </div>
                <span class="help_text">{$lang250}</span>
            </li>
            
            <li>
                <label>{$lang9}</label>
                <div class="Right">
                	<a href="{$baseurl}/edit_pass" class="Button WhiteButton Button18"><strong>{$lang251}</strong><span></span></a>
                </div>
            </li>
            
            {if $enable_fc eq "1"}
            <li>
                <label for="post_fb">{$lang482}</label>
                <div class="Right">
                    <p>
                    	<select name="post_fb" id="post_fb">
                        	<option value="0" {if $u.post_fb eq "0"}selected="selected"{/if}>{$lang484}</option>
                            <option value="1" {if $u.post_fb eq "1"}selected="selected"{/if}>{$lang483}</option>
                        </select>
                    </p>                        
                </div>
                <span class="help_text">{$lang485}</span>
            </li>
            {/if}
            
            <li>
                <label for="mail_like">{$lang492}</label>
                <div class="Right">
                    <p>
                    	<select name="mail_like" id="mail_like">
                        	<option value="0" {if $u.mail_like eq "0"}selected="selected"{/if}>{$lang484}</option>
                            <option value="1" {if $u.mail_like eq "1"}selected="selected"{/if}>{$lang483}</option>
                        </select>
                    </p>                        
                </div>
                <span class="help_text">{$lang494}</span>
            </li>
            
            <li>
                <label for="mail_com">{$lang493}</label>
                <div class="Right">
                    <p>
                    	<select name="mail_com" id="mail_com">
                        	<option value="0" {if $u.mail_com eq "0"}selected="selected"{/if}>{$lang484}</option>
                            <option value="1" {if $u.mail_com eq "1"}selected="selected"{/if}>{$lang483}</option>
                        </select>
                    </p>                        
                </div>
                <span class="help_text">{$lang495}</span>
            </li>
        </ul>
        
        <div class="Submit">
            <p>
                <a href="#" class="Button OrangeButton Button24" onclick="$('#profileEdit').submit(); return false">
                	<strong>{$lang18}</strong>
                	<span></span>
                </a>
            </p>
        </div>
        <input type="hidden" name="esub" value="1" />
    </form>
</div>