{if $error ne ""}
								<ul class="messages">
                                    <li class="error-msg">
                                    	<ul><li>{$error}</li></ul>
                                    </li>
                                </ul>
{/if}
{if $message ne ""}
								<ul class="messages">
                                	<li class="success-msg">
                                    	<ul><li>{$message}</li></ul>
                                    </li>
                                </ul>
{/if}
