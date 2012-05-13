<?php 

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used
	| by the validator class. Some of the rules contain multiple versions,
	| such as the size (max, min, between) rules. These versions are used
	| for different input types such as strings and files.
	|
	| These language lines may be easily changed to provide custom error
	| messages in your application. Error messages for custom validation
	| rules may also be added to this file.
	|
	*/

	"accepted"       => " :attribute 必须是'yes'或'1'.",
	"active_url"     => " :attribute 是无效URL.",
	"after"          => " :attribute 必须在 :date 之后.",
	"alpha"          => " :attribute 只应包含字母.",
	"alpha_dash"     => " :attribute 只应包含字母、数字、破折号.",
	"alpha_num"      => " :attribute 只应包含字母、数字.",
	"before"         => " :attribute 必须在 :date 之前.",
	"between"        => array(
		"numeric" => " :attribute 必须在此范围内 :min - :max.",
		"file"    => " :attribute 文件大小在此范围内 :min - :max kb.",
		"string"  => " :attribute 长度 :min - :max 个字母.",
	),
	"confirmed"      => " :attribute 两次输入不匹配.",
	"different"      => " :attribute 和 :other 必须不同.",
	"email"          => " :attribute 格式不正确.",
	"exists"         => " 选中:attribute 已存在.",
	"image"          => " :attribute 必须是图片.",
	"in"             => " :attribute 选项无效,超出范围 .",
	"integer"        => " :attribute 必须是整数.",
	"ip"             => " :attribute 无效IP格式.",
	"match"          => " :attribute 格式不匹配.",
	"max"            => array(
		"numeric" => " :attribute 必须小于 :max.",
		"file"    => " :attribute 文件大小不能超过 :max kb.",
		"string"  => " :attribute 不能超过 :max 个字母 .",
	),
	"mimes"          => " :attribute 文件类型必须是: :values.",
	"min"            => array(
		"numeric" => " :attribute 不应小于 :min.",
		"file"    => " :attribute 文件不应小于 :min kb.",
		"string"  => " :attribute 要求至少 :min 个字母 .",
	),
	"not_in"         => "选中项无效 :attribute .",
	"numeric"        => " :attribute 必须是数字.",
	"required"       => " :attribute 为必填字段.",
	"same"           => " :attribute 和 :other 必须一致.",
	"size"           => array(
		"numeric" => " :attribute 必须是 :size.",
		"file"    => " :attribute 必须是 :size kb.",
		"string"  => " :attribute m必须是 :size .",
	),
	"unique"         => " :attribute 已经注册过了 !",
	"url"            => " :attribute 是无效URL.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute_rule" to name the lines. This helps keep your
	| custom validation clean and tidy.
	|
	| So, say you want to use a custom validation message when validating that
	| the "email" attribute is unique. Just add "email_unique" to this array
	| with your custom message. The Validator will handle the rest!
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". Your users will thank you.
	|
	| The Validator class will automatically search this array of lines it
	| is attempting to replace the :attribute place-holder in messages.
	| It's pretty slick. We think you'll like it.
	|
	*/

	'attributes' => array(),

);