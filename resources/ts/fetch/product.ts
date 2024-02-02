export type Product = {
    id: string;
    name: string;
    image: string;
    description: string;
};

export async function getProducts(): Promise<Product[]> {
    const response = await fetch("/products", {
        method: "GET",
    });
    switch (response.status) {
        case 200:
            return await response.json();
        default:
            return [];
    }
}
