<div class="FixedContainer">
    <form id="profileEdit" class="Form StaticForm" action="{$baseurl}/edit_pass" method="POST" style="padding-top:20px;">
    {include file='error.tpl'} 
        <h3>{$lang251}</h3>
        <ul>
            
            <li>
                <label for="id_link">{$lang264}</label>
                <div class="Right">
                	<input type="password" name="password" value="" id="password" />
                </div>
            </li>
            
            <li>
                <label for="id_link">{$lang265}</label>
                <div class="Right">
                	<input type="password" name="npassword" value="" id="npassword" />
                </div>
            </li>
            
            <li>
                <label for="id_link">{$lang266}</label>
                <div class="Right">
                	<input type="password" name="cpassword" value="" id="cpassword" />
                </div>
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