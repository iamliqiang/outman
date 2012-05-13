@section('content')
    <div class="register-container">
    	
    	<div class="container">
			<div class="row">
				<div class="six columns">
					<a href="#"><img src="/img/portal/create.jpg" /></a>
				</div>
				<div class="six columns">
						
				{{Form::open('auth/register','POST',array('class'=>'nice'));}}
					<fieldset>

						<legend>
							<h4 style="margin-left: 20px; margin-right:20px; color:#555;"> 用户注册 </h4>
						</legend>

						<div class="login-form">
							<!-- check for register errors flash var -->
					       <!--  @if (Session::has('login_errors'))
					            <small class="error">{{Session::get('login_errors');}}:
					            	&nbsp电子邮件或用户密码填写错误.</small>
					        @endif -->

					     
					        <!-- username field -->
					       <!--  {{ Form::label('email', '用户名 <Email>' , array('for'=>'email')) }} -->
							
					        <p>{{ Form::text('email',Input::old('email'), array('id'=>'email','class'=>'nice oversize input-text',"placeholder"=>"电子邮件" )) }}</p>
					        @if ($errors->has('email'))
					        	<small class="error"> {{$errors->first('email');}}  </small>
							@endif

					        <!-- password field -->
					        <!-- {{ Form::label('password', '密码 ') }} -->
					        <p>{{ Form::password('password',array('id'=>'password','class'=>'oversize input-text',"placeholder"=>"输入密码")) }}</p>
					        @if ($errors->has('password'))
					        	<small class="error"> {{$errors->first('password');}}  </small>
							@endif

					        <p>{{ Form::password('password_confirmation',array('id'=>'password','class'=>'oversize input-text',"placeholder"=>"重复一次密码")) }}</p>

					        <!-- submit button -->
					        
					        {{ Form::submit('注册', array("class"=>"nice radius blue button")) }}
						</div>

					</fieldset> 	{{Form::token();}}
				{{Form::close();}}
				
				</div>
			</div>
		</div>

	</div>
@endsection
