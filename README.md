# FragMENTS website

English-language research project website and native WordPress block theme.

## Files

- `preview/`: complete static preview. Open `preview/index.html` in a browser.
- `wordpress/fragments/`: installable theme source, version 3.0.19.
- `tools/package_theme.py`: creates `dist/fragments-wordpress.zip` using Python 3 (standard library only).

The pages are Home, Project, Research, Team, Open Science and Contact. Applications are included in Open Science; the previous Applications URL redirects there. The homepage uses a static 3D image focused on Lower Town. Research connects observed damage, modelling questions, work packages and validation. Photograph attribution: damage assessment database, CCEE.

## Install in WordPress

1. Run `python tools/package_theme.py` from the repository root.
2. In WordPress, open Appearance > Themes > Add New > Upload Theme and upload the generated ZIP.
3. Activate FragMENTS. The theme creates missing project pages without replacing existing content.
4. For an existing installation, use Appearance > FragMENTS setup to create missing pages. Update existing page content manually using the corresponding FragMENTS block patterns.

Requires WordPress 6.6 or later and PHP 7.4 or later. Preview HTML and native WordPress patterns are separate representations; update both when changing page content. No build dependencies are needed to view the preview.

## Assets and publication

Institution logos, portraits and scientific illustrations retain their source attribution in the theme's credits. Their inclusion does not grant a separate licence to reuse third-party artwork or photographs.

Uploading this folder to GitHub stores the website source; it does not deploy a live WordPress website or enable GitHub Pages. No project application documents, local credentials or earlier design archives are included in this folder. Deployment secrets must remain outside version control.
