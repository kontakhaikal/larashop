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

export async function deleteCategory(id: string) {
    const response = await fetch(`/categories/${id}`, {
        method: "DELETE",
    });
    switch (response.status) {
        case 200:
            return await response.json();
        default:
            console.log({ response });
            return [];
    }
}
