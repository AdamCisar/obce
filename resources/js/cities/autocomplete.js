import { autocomplete } from '@algolia/autocomplete-js';
import '@algolia/autocomplete-theme-classic';

const Autocomplete = {
  
  init() {
    const debounced = this.debouncePromise((items) => Promise.resolve(items), 300);
    autocomplete({
      container: '#autocomplete',
      detachedMediaQuery: 'none',
      stallThreshold: 500,
      getSources({ query }) {
        return debounced([
          {
            sourceId: 'cities',
            templates: {
              item({ item, html }) {
                return html`<a class="aa-ItemLink">${item.name}</a>`;
              },
            },
            getItemInputValue({ item }) {
              return item.name;
            },
            getItemUrl({ item }) {
              return item.url;
            },
            onSelect({ item }) {
              window.location.href = item.url;
            },
            async getItems({ query }) {
              if (!query) return [];
              try {
                const response = await axios.get('/autocomplete', { params: { q: query } });
                return response.data;
              } catch (error) {
                console.error('Autocomplete fetch error:', error);
                return [];
              }
            },
          },
        ]);
      },
    });
  },

  debouncePromise(fn, time) {
    let timer;

    return function debounced(...args) {
      if (timer) {
        clearTimeout(timer);
      }

      return new Promise((resolve) => {
        timer = setTimeout(() => resolve(fn(...args)), time);
      });
    };
  }
}

Autocomplete.init();
