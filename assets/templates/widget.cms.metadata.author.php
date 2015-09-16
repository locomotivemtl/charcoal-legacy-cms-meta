{{!
	Widget: Author Metadata Elements
	================================

	@see CMS\Trait_Content_Metadata_Author
}}
{{# has_author_metadata_trait }}
		{{# meta_author_name }}
		<meta name="author" content="{{ meta_author_name }}" />
		{{/ meta_author_name }}

		{{# meta_author_url }}
		<link rel="author" href="{{ meta_author_url }}" />
		{{/ meta_author_url }}
{{/ has_author_metadata_trait }}
