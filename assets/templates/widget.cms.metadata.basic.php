{{!
	Widget: Basic Metadata Elements
	===============================

	@see CMS\Trait_Content_Metadata_Basic
}}
{{# has_basic_metadata_trait }}
		<title>{{^ document_title }}{{ meta_title }}{{/ document_title }}{{ document_title }}</title>

		{{# meta_description }}
		<meta name="description" content="{{ meta_description }}" />
		{{/ meta_description }}
{{/ has_basic_metadata_trait }}
