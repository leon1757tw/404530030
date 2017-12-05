const input = document.querySelector('#image_uploads');
const preview = document.querySelector('.preview');
const result = document.querySelector('#result');

const fileTypes = [
    'image/jpeg',
    'image/pjpeg',
    'image/png'
];

input.style.visibility = 'hidden';
input.addEventListener('change', updateImageDisplay);

function updateImageDisplay() {
    while (preview.firstChild) {
        preview.removeChild(preview.firstChild);
    }

    const currentFiles = input.files;
    if (currentFiles.length === 0) {
        const paragraph = document.createElement('p');
        paragraph.textContent = 'No files currently selected for upload';
        preview.appendChild(paragraph);
    } else {
        const list = document.createElement('ol');
        preview.appendChild(list);
        for (let i = 0; i < currentFiles.length; i++) {
            const listItem = document.createElement('li');
            const paragraph = document.createElement('p');
            if (validFileType(currentFiles[i])) {
                paragraph.textContent = 'File name : ' + currentFiles[i].name + ' , File size : ' + returnFileSize(currentFiles[i].size) + '.';
                const image = document.createElement('img');
                image.src = window.URL.createObjectURL(currentFiles[i]);
                listItem.appendChild(image);
                listItem.appendChild(paragraph);

            } else {
                paragraph.textContent = 'File name : ' + currentFiles[i].name + ' , Not a Valid File Type.';
                listItem.appendChild(paragraph);
            }

            list.appendChild(listItem);
        }
    }
}

function validFileType(file) {
    for (let i = 0; i < fileTypes.length; i++) {
        if (file.type === fileTypes[i]) {
            return true;
        }
    }
    return false;
}

function returnFileSize(number) {
    if (number < 1048576) {
        return (number / 1024).toFixed(1) + 'KB';
    } else if (number > 1048576) {
        return (number / 1048576).toFixed(1) + 'MB';
    }
}
