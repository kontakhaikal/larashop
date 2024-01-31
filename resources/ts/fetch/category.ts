export type Category = {
    id: string;
    name: string;
};

export async function getCategories(): Promise<Category[]> {
    const response = await fetch("/categories", {
        method: "GET",
    });

    switch (response.status) {
        case 200:
            return await response.json();
        default:
            return [];
    }
}
