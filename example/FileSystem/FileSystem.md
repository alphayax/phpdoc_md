# FileSystem

- [FileSharingLink](#FileSharingLink)
- [FileSystemListing](#FileSystemListing)
- [FileSystemOperation](#FileSystemOperation)
- [FileSystemTask](#FileSystemTask)
- [FileUpload](#FileUpload)


<a name="FileSharingLink"></a>
## FileSharingLink

**Namespace**  : alphayax\freebox\api\v3\services\FileSystem

### Public methods

| Method | Description |
|---|---|
| `getAll` |  | 
| `getFromToken` |  | 
| `deleteFromToken` | Delete a File Sharing link | 
| `create` |  | 

<a name="FileSystemListing"></a>
## FileSystemListing

**Namespace**  : alphayax\freebox\api\v3\services\FileSystem

### Public methods

| Method | Description |
|---|---|
| `getFilesFromDirectory` |  | 
| `getFileInformation` |  | 

<a name="FileSystemOperation"></a>
## FileSystemOperation

**Namespace**  : alphayax\freebox\api\v3\services\FileSystem

### Public methods

| Method | Description |
|---|---|
| `move` |  | 
| `copy` |  | 
| `remove` |  | 
| `cat` |  | 
| `archive` |  | 
| `extract` |  | 
| `repair` |  | 
| `computeHash` | Hash a file. This operation can take some time. To get the hash value, | 
| `getHashValue` | Get the hash value | 
| `createDirectory` | Create a directory | 
| `rename` | Rename a file/folder | 
| `download` |  | 

<a name="FileSystemTask"></a>
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

<a name="FileUpload"></a>
## FileUpload

**Namespace**  : alphayax\freebox\api\v3\services\FileSystem

### Public methods

| Method | Description |
|---|---|
| `createAuthorization` |  | 
| `uploadFile` |  | 
| `getAll` |  | 
| `getFromId` |  | 
| `cancelFromId` | Cancel the given FileUpload closing the connection | 
| `deleteFromId` |  | 
| `cleanTerminated` |  | 
