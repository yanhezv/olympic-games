export function moneyFormat(mount: number) {
   return mount
      .toFixed(2)
      .toString()
      .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
