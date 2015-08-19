{{!
	Widget: Basic Metadata Elements
	===============================

	@see CMS\Trait_Content_Metadata_Basic
}}
{{#has_metadata_basic}}
{{#document_title}}
<title>{{document_title}}</title>
{{/document_title}}

{{#meta_description}}
<meta name="description" content="{{meta_description}}" />
{{/meta_description}}
{{/has_metadata_basic}}
