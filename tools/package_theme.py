"""Build an installable WordPress ZIP from the tracked theme."""
from pathlib import Path
from zipfile import ZipFile, ZIP_DEFLATED

root = Path(__file__).resolve().parents[1]
theme = root
destination = root / 'dist' / 'fragments-wordpress.zip'
destination.parent.mkdir(exist_ok=True)
with ZipFile(destination, 'w', ZIP_DEFLATED) as archive:
    for entry in ('assets', 'parts', 'patterns', 'templates', 'CREDITS.txt', 'functions.php', 'style.css', 'theme.json'):
        source = theme / entry
        paths = sorted(source.rglob('*')) if source.is_dir() else [source]
        for path in paths:
            if path.is_file():
                archive.write(path, Path('fragments') / path.relative_to(theme))
with ZipFile(destination) as archive:
    assert archive.testzip() is None
    assert 'fragments/style.css' in archive.namelist()
    assert 'fragments/templates/index.html' in archive.namelist()
    assert b'Theme Name: FragMENTS' in archive.read('fragments/style.css')
print(destination)
