# FragMENTS website

English-language research project website and native WordPress block theme.

## Files

- `preview/`: complete static preview. Open `preview/index.html` in a browser.
- Repository root: installable theme source, version 3.0.29 (`style.css`, `theme.json`, `functions.php`, `templates/`, `parts/`, `patterns/`, `assets/`).
- `tools/package_theme.py`: creates `dist/fragments-wordpress.zip` using Python 3 (standard library only).

The pages are Home, Project, Research, Team, Open Science, News and Contact. Applications are included in Open Science; the previous Applications URL redirects there. The homepage uses a static 3D image focused on Lower Town. Research connects observed damage, modelling questions, work packages and validation. Photograph attribution: damage assessment database, CCEE.

## Install in WordPress

### Open the complete site in Playground

[Launch FragMENTS in WordPress Playground](https://playground.wordpress.net/?blueprint-url=https%3A%2F%2Fraw.githubusercontent.com%2Fmaja2C2E%2Ffragments-website%2Fmain%2Fblueprint.json)

This Blueprint installs and activates the released theme, creates missing project pages and opens the homepage. A plain Playground session starts with a default WordPress theme; it does not load this repository automatically.

For the VS Code Playground extension, open `FragMENTS.code-workspace` (or this repository folder itself), then start a new WordPress server. The workspace root must contain this theme's `style.css`. Opening the parent research folder instead starts a generic WordPress instance. In an existing instance, install and activate FragMENTS through Appearance > Themes.

### Install the ZIP

1. Download `fragments-wordpress.zip` from the latest GitHub release, or build it with `python tools/package_theme.py`.
2. In WordPress, open Appearance > Themes > Add New > Upload Theme and upload that ZIP. GitHub theme installers can also use this repository directly because `style.css` is at the repository root.
3. Activate FragMENTS. The theme creates missing project pages without replacing existing content.
4. For an existing installation, use Appearance > FragMENTS setup to create missing pages. Update existing page content manually using the corresponding FragMENTS block patterns.

Requires WordPress 6.6 or later and PHP 7.4 or later. Preview HTML and native WordPress patterns are separate representations; update both when changing page content. No build dependencies are needed to view the preview.

## Assets and publication

Institution logos, portraits and scientific illustrations retain their source attribution in the theme's credits. Their inclusion does not grant a separate licence to reuse third-party artwork or photographs.

Uploading this folder to GitHub stores the website source; it does not deploy a live WordPress website or enable GitHub Pages. No project application documents, local credentials or earlier design archives are included in this folder. Deployment secrets must remain outside version control.

## Publishing news

After deploying version 3.0.29, open the WordPress Dashboard once to create the missing News page and the FragMENTS News category. Existing pages are preserved. Add a post through Posts > Add New, select **FragMENTS News**, optionally set a featured image and excerpt, then publish. News lists six posts per page, newest first, with pagination. The static preview shows the empty state; actual posts appear in WordPress.

Project period: **1 October 2026 – 30 September 2029** (36 months).
