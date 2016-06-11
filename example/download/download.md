# download

- [BlackList](#BlackList)
- [Configuration](#Configuration)
- [Download](#Download)
- [Feed](#Feed)
- [Peer](#Peer)
- [Tracker](#Tracker)


<a name="BlackList"></a>
## BlackList

**Namespace**  : alphayax\freebox\api\v3\services\download

### Public methods

| Method | Description |
|---|---|
| `getAllFromDownloadTaskId` | Get the list of blacklist entries for a given download | 
| `emptyBlackListFromDownloadId` | Empty the blacklist for a given download | 
| `removeBlackListEntry` |  | 
| `addBlackListEntry` |  | 

<a name="Configuration"></a>
## Configuration

**Namespace**  : alphayax\freebox\api\v3\services\download

### Public methods

| Method | Description |
|---|---|
| `getConfiguration` |  | 
| `setConfiguration` |  | 
| `updateThrottlingMode` | You can force the throttling mode using this method. | 

<a name="Download"></a>
## Download

**Namespace**  : alphayax\freebox\api\v3\services\download

### Public methods

| Method | Description |
|---|---|
| `getAll` |  | 
| `getFromId` |  | 
| `update` |  | 
| `addFromUrl` |  | 
| `addFromUrls` |  | 
| `addFromFile` |  | 
| `getStats` |  | 
| `getFilesFromId` |  | 

<a name="Feed"></a>
## Feed

**Namespace**  : alphayax\freebox\api\v3\services\download

### Public methods

| Method | Description |
|---|---|
| `getAllFeeds` |  | 
| `getFeedFromId` |  | 
| `addFeed` |  | 
| `removeFeed` |  | 
| `updateFeed` |  | 
| `refreshFeed` | Remotely fetches the RSS feed and updates it. | 
| `refreshFeeds` | Remotely fetches the RSS feed and updates it. | 
| `getFeedItems` |  | 
| `updateFeedItem` |  | 
| `downloadFeedItem` |  | 
| `markFeedAsRead` |  | 

<a name="Peer"></a>
## Peer

**Namespace**  : alphayax\freebox\api\v3\services\download

### Public methods

| Method | Description |
|---|---|
| `getAll` | Get the list of peers for a given Download | 

<a name="Tracker"></a>
## Tracker

**Namespace**  : alphayax\freebox\api\v3\services\download

### Public methods

| Method | Description |
|---|---|
| `getAll` | Each torrent Download task has one or more DownloadTracker. | 
| `add` | Add a new tracker | 
| `remove` | Remove a tracker | 
| `update` | Update a tracker | 
