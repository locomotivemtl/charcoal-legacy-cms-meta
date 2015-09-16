{{!
	Widget: HTML Metadata Elements
	==============================
}}
{{> widget.cms.metadata.basic }}
{{# has_keyword_metadata_trait }}

{{> widget.cms.metadata.keywords }}
{{/ has_keyword_metadata_trait }}
{{# has_author_metadata_trait }}

{{> widget.cms.metadata.author }}
{{/ has_author_metadata_trait }}
{{# has_og_metadata_trait }}

{{> widget.cms.metadata.opengraph }}
{{/ has_og_metadata_trait }}
