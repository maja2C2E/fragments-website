"""Build an installable WordPress ZIP from the tracked theme."""
from pathlib import Path
from zipfile import ZipFile, ZIP_DEFLATED

root = Path(__file__).resolve().parents[1]
theme = root / 'wordpress' / 'fragments'
destination = root / 'dist' / 'fragments-wordpress.zip'
destination.parent.mkdir(exist_ok=True)
with ZipFile(destination, 'w', ZIP_DEFLATED) as archive:
    for path in sorted(theme.rglob('*')):
        if path.is_file():
            archive.write(path, path.relative_to(theme.parent))
with ZipFile(destination) as archive:
    assert archive.testzip() is None
print(destination)
