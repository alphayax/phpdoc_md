# FileSystem

- [FileSharingLink](#FileSharingLink)
- [FileSystemListing](#FileSystemListing)
- [FileSystemOperation](#FileSystemOperation)
- [FileSystemTask](#FileSystemTask)
- [FileUpload](#FileUpload)


<a name="FileSharingLink"></a>"
## FileSharingLink

**Namespace**  : alphayax\freebox\api\v3\services\FileSystem

### Public methods

| Method | Description |
|---|---|
| `getAll` | Retrieve a File Sharing link | 
| `getFromToken` |  | 
| `deleteFromToken` | Delete a File Sharing link Deletes the ShareLink task with the given token, if the task was running, stop it. | 
| `create` | Create a File Sharing link | 

<a name="FileSystemListing"></a>"
## FileSystemListing

**Namespace**  : alphayax\freebox\api\v3\services\FileSystem

### Public methods

| Method | Description |
|---|---|
| `getFilesFromDirectory` |  | 
| `getFileInformation` | Get file information | 

<a name="FileSystemOperation"></a>"
## FileSystemOperation

**Namespace**  : alphayax\freebox\api\v3\services\FileSystem

### Public methods

| Method | Description |
|---|---|
| `move` | Move files | 
| `copy` | Copy files | 
| `remove` | Delete files | 
| `cat` | Concatenate files (Miaw ^^) | 
| `archive` | Create an archive | 
| `extract` | Extract an archive | 
| `repair` | Repair files from a .par2 | 
| `computeHash` | Hash a file. This operation can take some time. To get the hash value, the returned task must have succeed and be in the state “done”. | 
| `getHashValue` | Get the hash value To get the hash, the task must have succeed and be in the state “done”. | 
| `createDirectory` | Create a directory Contrary to other file system tasks, this operation is done synchronously. | 
| `rename` | Rename a file/folder Contrary to other file system tasks, this operation is done synchronously. | 
| `download` | Download a file from the freebox server | 

<a name="FileSystemTask"></a>"
## FileSystemTask

**Namespace**  : alphayax\freebox\api\v3\services\FileSystem

### Public methods

| Method | Description |
|---|---|
| `getAllTasks` |  | 
| `getTaskById` |  | 
| `deleteTask` |  | 
| `deleteTaskById` |  | 
| `updateTask` |  | 

<a name="FileUpload"></a>"
## FileUpload

**Namespace**  : alphayax\freebox\api\v3\services\FileSystem

### Public methods

| Method | Description |
|---|---|
| `createAuthorization` | Create a file upload authorization | 
| `uploadFile` | Send the content of the FileUpload task | 
| `getAll` | Get the list of uploads | 
| `getFromId` | Track an upload status | 
| `cancelFromId` | Cancel the given FileUpload closing the connection The upload status must be in_progress | 
| `deleteFromId` | Delete the given FileUpload closing the connection if needed | 
| `cleanTerminated` | Deletes all the FileUpload not in_progress | 