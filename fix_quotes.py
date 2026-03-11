# Read the file
with open('resources/views/index.blade.php', 'r', encoding='utf-8') as f:
    content = f.read()

# Fix the escaped quotes: {{ asset(\' should be {{ asset('
content = content.replace("\\'", "'")

# Write the file back
with open('resources/views/index.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)

print('Fixed!')
