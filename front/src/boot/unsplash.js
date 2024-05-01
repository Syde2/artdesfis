import { createApi } from 'unsplash-js';

const key =  import.meta.env.VITE_MY_UNSPLASH_KEY;

const unsplash = createApi({
  accessKey:   key,
  // `fetch` options to be sent with every request
  headers: { 'X-Custom-Header': 'foo' },
});


export {unsplash}

