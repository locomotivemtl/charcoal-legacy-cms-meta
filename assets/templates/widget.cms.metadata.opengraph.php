{{!
	Widget: OpenGraph Metadata Elements
	===================================

	@see CMS\Trait_Content_Metadata_OpenGraph
}}
{{#has_og_metadata_trait}}
{{#meta_type}}
<meta property="og:type"        content="{{meta_type}}" />
{{/meta_type}}
{{#url}}
<meta property="og:url"         content="{{url}}" />
{{/url}}
{{#meta_title}}
<meta property="og:title"       content="{{meta_title}}" />
{{/meta_title}}
{{#meta_description}}
<meta property="og:description" content="{{meta_description}}" />
{{/meta_description}}
{{#meta_image}}
<meta property="og:image"       content="{{URL}}{{meta_image}}" />
{{/meta_image}}
{{#meta_site_name}}
<meta property="og:site_name"   content="{{meta_site_name}}" />
{{/meta_site_name}}
{{/has_og_metadata_trait}}
