@section('content')
<div id="login-container">
	<div class="container">
	
	
		<div class="row">

			<div class="six columns">
				<a href="#"><img src="/img/portal/login.jpg" /></a>
			</div>
			<div class="six columns">
				
				{{Form::open('auth/login','POST',array('class'=>'nice'));}}
					
					<fieldset>
						<legend>
							<h4 style="padding-left: 20px; padding-right:20px;color:#555;"> 用户登录 </h4>
						</legend>

						<div class="login-form">
							<!-- check for login errors flash var -->
					        @if (Session::has('noactivate_errors'))
					            <small class="error">{{Session::get('noactivate_errors');}} </small>
					        @endif


					        @if (Session::has('login_errors'))
					            <small class="error">{{Session::get('login_errors');}}&nbsp电子邮件或用户密码不正确 !</small>
					        @endif

					        <!-- username field -->
					       <!--  {{ Form::label('email', '用户名 <Email>' , array('for'=>'oversizeNiceInput')) }} -->
					        <p>{{ Form::text('email',Input::old('email'), array('id'=>'email','class'=>'nice oversize input-text',"placeholder"=>"电子邮件" )) }}</p>
					        @if ($errors->has('email'))
					        	<small class="error"> {{$errors->first('email');}}  </small>
							@endif

					        <!-- password field -->
					        <!-- {{ Form::label('password', '密码 ') }} -->
					        <p>{{ Form::password('password',array('value' => Input::old('password'),'id'=>'password','class'=>'oversize input-text',"placeholder"=>"用户密码")) }}</p>
							@if ($errors->has('password'))
					        	<small class="error"> {{$errors->first('password');}}  </small>
							@endif

					        <!-- submit button -->
					        {{Form::checkbox('rememberme', 'rememberme', false);}} 保持登录状态
					        {{ Form::submit('登录', array("class"=>"nice radius blue button","style"=>"float: right")) }}
					        <br />   

					      
						</div>
					</fieldset>
					<p style="margin-top:30px; margin-left: 35px;"> 还没有账号？现在就去-{{HTML::link_to_action('auth@register', '注册');}} </p>

				{{Form::close();}}
				
			</div>
		</div>

	</div>
</div>
@endsection
