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
							<h4 style="margin-left: 20px; margin-right:20px;"> 用户注册 </h4>
						</legend>
						<div class="login-form">
							<!-- check for register errors flash var -->
					        @if (Session::has('login_errors'))
					            <span class="error">电子邮件或用户密码填写错误.</span>
					        @endif

					        <!-- username field -->
					       <!--  {{ Form::label('email', '用户名 <Email>' , array('for'=>'oversizeNiceInput')) }} -->
					        <p>{{ Form::text('email',null, array('id'=>'email','class'=>'nice oversize input-text',"placeholder"=>"您的电子邮件" )) }}</p>

					        <!-- password field -->
					        <!-- {{ Form::label('password', '密码 ') }} -->
					        <p>{{ Form::password('password',array('id'=>'password','class'=>'oversize input-text',"placeholder"=>"输入密码")) }}</p>
					        <p>{{ Form::password('password',array('id'=>'password','class'=>'oversize input-text',"placeholder"=>"再输入一次密码")) }}</p>

					        <!-- submit button -->
					        
					        {{ Form::submit('注册', array("class"=>"nice radius blue button")) }}
						</div>
					</fieldset>
				
				{{Form::token();}}
				{{Form::close();}}
				
				</div>
			</div>
		</div>

	</div>
@endsection
