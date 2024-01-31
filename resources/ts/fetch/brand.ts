export type Brand = {
    id: string;
    name: string;
};

export async function getBrands(): Promise<Brand[]> {
    const response = await fetch("/brands", {
        method: "GET",
    });

    switch (response.status) {
        case 200:
            return await response.json();
        default:
            return [];
    }
}
